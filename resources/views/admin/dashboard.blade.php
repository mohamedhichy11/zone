@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-[#EE626B]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Games</p>
                <p class="text-3xl font-bold">{{ $gamesCount }}</p>
            </div>
            <i class="fa-solid fa-gamepad text-3xl text-[#EE626B]"></i>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Orders</p>
                <p class="text-3xl font-bold">{{ $ordersCount }}</p>
            </div>
            <i class="fa-solid fa-truck text-3xl text-blue-500"></i>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Customers</p>
                <p class="text-3xl font-bold">{{ $customersCount }}</p>
            </div>
            <i class="fa-solid fa-users text-3xl text-green-500"></i>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Revenue</p>
                <p class="text-3xl font-bold">${{ number_format($revenue, 2) }}</p>
            </div>
            <i class="fa-solid fa-dollar-sign text-3xl text-yellow-500"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Recent Orders</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="pb-2">ID</th>
                    <th class="pb-2">Customer</th>
                    <th class="pb-2">Total</th>
                    <th class="pb-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                <tr class="border-b last:border-0">
                    <td class="py-2">#{{ $order->id }}</td>
                    <td class="py-2">{{ $order->user->name ?? 'N/A' }}</td>
                    <td class="py-2">${{ number_format($order->total, 2) }}</td>
                    <td class="py-2"><span class="px-2 py-1 rounded text-xs {{ $order->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">{{ $order->status }}</span></td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-4 text-center text-gray-400">No orders yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Top Selling Games</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="pb-2">Game</th>
                    <th class="pb-2">Sold</th>
                </tr>
            </thead>
            <tbody>
                @forelse($topGames as $item)
                <tr class="border-b last:border-0">
                    <td class="py-2">{{ $item->game->name ?? 'N/A' }}</td>
                    <td class="py-2">{{ $item->total_qty }}</td>
                </tr>
                @empty
                <tr><td colspan="2" class="py-4 text-center text-gray-400">No sales yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
