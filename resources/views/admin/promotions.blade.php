@extends('admin.layouts.app')
@section('title', 'Promotions')
@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b">
        <h2 class="text-lg font-semibold">Manage Game Sales</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr class="text-left text-gray-500">
                    <th class="p-3">Game</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">On Sale</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Toggle</th>
                </tr>
            </thead>
            <tbody>
                @forelse($games as $game)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $game->name }}</td>
                    <td class="p-3">${{ number_format($game->prix, 2) }}</td>
                    <td class="p-3">
                        @if($game->solde)
                            <span class="text-green-600"><i class="fa-solid fa-check-circle"></i> Yes</span>
                        @else
                            <span class="text-gray-400"><i class="fa-solid fa-times-circle"></i> No</span>
                        @endif
                    </td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs {{ $game->status === 'available' ? 'bg-green-100 text-green-700' : ($game->status === 'out_of_stock' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700') }}">
                            {{ str_replace('_', ' ', ucfirst($game->status)) }}
                        </span>
                    </td>
                    <td class="p-3">
                        <form action="{{ route('admin.toggle.solde', $game->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-1 rounded text-xs {{ $game->solde ? 'bg-gray-300 text-gray-700' : 'bg-green-500 text-white' }} hover:opacity-80 transition">
                                {{ $game->solde ? 'Remove Sale' : 'Put on Sale' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="p-6 text-center text-gray-400">No games found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">{{ $games->links() }}</div>
</div>
@endsection
