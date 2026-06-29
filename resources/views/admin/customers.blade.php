@extends('admin.layouts.app')
@section('title', 'Customers')
@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b">
        <h2 class="text-lg font-semibold">All Customers</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr class="text-left text-gray-500">
                    <th class="p-3">ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Orders</th>
                    <th class="p-3">Joined</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">#{{ $customer->id }}</td>
                    <td class="p-3">{{ $customer->name }}</td>
                    <td class="p-3">{{ $customer->email }}</td>
                    <td class="p-3">{{ $customer->orders_count }}</td>
                    <td class="p-3">{{ $customer->created_at->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="p-6 text-center text-gray-400">No customers yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">{{ $customers->links() }}</div>
</div>
@endsection
