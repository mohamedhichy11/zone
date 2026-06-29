@extends('admin.layouts.app')
@section('title', 'Order #' . $order->id)
@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-lg font-semibold">Order #{{ $order->id }}</h2>
            <p class="text-gray-500 text-sm">{{ $order->created_at->format('F j, Y g:i A') }}</p>
        </div>
        <span class="px-3 py-1 rounded text-sm {{ $order->status === 'paid' ? 'bg-green-100 text-green-700' : ($order->status === 'shipped' ? 'bg-blue-100 text-blue-700' : ($order->status === 'delivered' ? 'bg-gray-100 text-gray-700' : 'bg-yellow-100 text-yellow-700')) }}">{{ ucfirst($order->status) }}</span>
    </div>

    <div class="mb-6">
        <h3 class="font-semibold mb-2">Customer</h3>
        <p>{{ $order->user->name ?? 'N/A' }}</p>
        <p class="text-gray-500">{{ $order->user->email ?? 'N/A' }}</p>
    </div>

    <h3 class="font-semibold mb-2">Items</h3>
    <table class="w-full text-sm mb-6">
        <thead class="bg-gray-50">
            <tr class="text-left text-gray-500">
                <th class="p-3">Game</th>
                <th class="p-3">Price</th>
                <th class="p-3">Qty</th>
                <th class="p-3">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr class="border-b">
                <td class="p-3">{{ $item->game->name ?? 'N/A' }}</td>
                <td class="p-3">${{ number_format($item->price, 2) }}</td>
                <td class="p-3">{{ $item->quantity }}</td>
                <td class="p-3">${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="font-bold">
                <td colspan="3" class="p-3 text-right">Total:</td>
                <td class="p-3">${{ number_format($order->total, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <a href="{{ route('admin.orders') }}" class="text-[#EE626B] hover:underline"><i class="fa-solid fa-arrow-left"></i> Back to Orders</a>
</div>
@endsection
