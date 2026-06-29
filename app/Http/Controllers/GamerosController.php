<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddGameRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class GamerosController extends Controller
{

    public function index(Request $request)
    {
        $query = Game::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('desc', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('category')) {
            if ($request->category === 'top_action') {
                $query->where('category', 'action')->where('top', 'yes');
            } elseif ($request->category === 'top_sport') {
                $query->where('category', 'sport')->where('top', 'yes');
            } elseif (in_array($request->category, ['action', 'sport'])) {
                $query->where('category', $request->category);
            }
        }

        $sortField = $request->get('sort', 'name');
        $sortDir = $request->get('dir', 'asc');
        if (in_array($sortField, ['name', 'prix', 'category', 'created_at'])) {
            $query->orderBy($sortField, $sortDir === 'desc' ? 'desc' : 'asc');
        }

        $games = $query->paginate(6)->appends($request->query());

        return view('modifierGame', ['games' => $games]);
    }

    public function create()
    {
        return view("addGame");
    }

    public function store(AddGameRequest $request)
    {
        $imagePath = $request->file('image')->store('games', 'public');

        Game::create([
            'name' => $request->name,
            'prix' => $request->prix,
            'category' => $request->category,
            'image' => $imagePath,
            'desc' => $request->desc,
            'solde' => $request->boolean('solde'),
            'top' => $request->has('top') ? 'yes' : 'no',
        ]);

        return back()->with('success', 'Game added successfully.');
    }

    public function edit(string $id)
    {
        $game = Game::findOrFail($id);
        return view('edit')->with('game', $game);
    }

    public function update(AddGameRequest $request, $id)
    {
        $game = Game::findOrFail($id);

        $data = [
            'name' => $request->name,
            'prix' => $request->prix,
            'desc' => $request->desc,
            'category' => $request->category,
            'solde' => $request->boolean('solde'),
            'top' => $request->has('top') ? 'yes' : 'no',
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('games', 'public');
        }

        $game->update($data);

        return redirect()->route('modifie')->with('success', 'Game updated successfully.');
    }

    public function destroy($id)
    {
        $game = Game::find($id);

        if (!$game) {
            return back()->with('error', 'Game not found.');
        }

        $game->delete();

        return back()->with('successdelete', 'Game deleted successfully.');
    }

    public function toggleTop($id)
    {
        $game = Game::findOrFail($id);
        $newStatus = $game->top === 'yes' ? 'no' : 'yes';

        if ($newStatus === 'yes') {
            $currentTop = Game::where('category', $game->category)->where('top', 'yes')->count();
            if ($currentTop >= 3) {
                return back()->with('error', "Maximum 3 top games per category. Remove another top game first.");
            }
        }

        $game->top = $newStatus;
        $game->save();

        return back()->with('success', "Top status toggled for {$game->name}");
    }

    public function toggleSolde($id)
    {
        $game = Game::findOrFail($id);
        $game->solde = !$game->solde;
        $game->save();

        return back()->with('success', "Promotion " . ($game->solde ? 'activated' : 'deactivated') . " for {$game->name}");
    }
}
