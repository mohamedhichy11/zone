@extends('admin.layouts.app')
@section('title', 'Orders')
@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b flex justify-between items-center">
        <h2 class="text-lg font-semibold">All Orders</h2>
        <a href="{{ route('admin.orders.export') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition text-sm"><i class="fa-solid fa-download"></i> Export CSV</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr class="text-left text-gray-500">
                    <th class="p-3">ID</th>
                    <th class="p-3">Customer</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">#{{ $order->id }}</td>
                    <td class="p-3">{{ $order->user->name ?? 'N/A' }}</td>
                    <td class="p-3">{{ $order->user->email ?? 'N/A' }}</td>
                    <td class="p-3">${{ number_format($order->total, 2) }}</td>
                    <td class="p-3">
                        <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="inline">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="text-sm border rounded px-2 py-1 {{ $order->status === 'paid' ? 'text-green-700' : ($order->status === 'shipped' ? 'text-blue-700' : 'text-yellow-700') }}">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </form>
                    </td>
                    <td class="p-3">{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.order.detail', $order->id) }}" class="text-blue-500 hover:underline"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="p-6 text-center text-gray-400">No orders found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">{{ $orders->links() }}</div>
</div>
@endsection
