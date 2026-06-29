<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
   public function afficheGame(Request $request, $cat){

    $query = Game::where('category', $cat);

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'LIKE', "%{$search}%");
    }

    $mygames = $query->paginate(8);

    return view("AffGames", [
        "mygames" => $mygames,
        "categorie" => $cat,
    ]);
   }

   public function allGames(Request $request)
   {
       $query = Game::query();

       if ($request->has('category') && in_array($request->category, ['action', 'sport'])) {
           $query->where('category', $request->category);
       }

       if ($request->has('search')) {
           $search = $request->input('search');
           $query->where('name', 'LIKE', "%{$search}%");
       }

       $mygames = $query->paginate(12);

       return view("AffGames", [
           "mygames" => $mygames,
           "categorie" => 'all',
       ]);
   }

}
