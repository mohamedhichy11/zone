<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $gamesCount = Game::count();
        $ordersCount = Order::count();
        $customersCount = User::count();
        $revenue = Order::where('status', 'paid')->sum('total');
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        $topGames = OrderItem::selectRaw('game_id, SUM(quantity) as total_qty')
            ->groupBy('game_id')
            ->orderByDesc('total_qty')
            ->with('game')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('gamesCount', 'ordersCount', 'customersCount', 'revenue', 'recentOrders', 'topGames'));
    }

    public function orders()
    {
        $orders = Order::with('user', 'items.game')->latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = Order::with('user', 'items.game')->findOrFail($id);
        return view('admin.order-detail', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Order status updated.');
    }

    public function customers()
    {
        $customers = User::withCount('orders')->latest()->paginate(15);
        return view('admin.customers', compact('customers'));
    }

    public function promotions()
    {
        $games = Game::latest()->paginate(15);
        return view('admin.promotions', compact('games'));
    }

    public function toggleSolde(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->update(['solde' => $request->boolean('solde')]);
        return back()->with('success', 'Game sale status updated.');
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:profils,email,' . $admin->id,
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        $data = ['nom' => $request->nom, 'email' => $request->email];

        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $data['password'] = bcrypt($request->new_password);
        }

        Profil::where('id', $admin->id)->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function exportOrders()
    {
        $orders = Order::with('user', 'items.game')->get();

        $csv = "Order ID,Customer,Email,Total,Status,Date\n";
        foreach ($orders as $order) {
            $csv .= "{$order->id},{$order->user->name},{$order->user->email},{$order->total},{$order->status},{$order->created_at}\n";
        }

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="orders.csv"',
        ]);
    }
}
