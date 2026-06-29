@extends('homeG')
@section("title","Modifier")
@section('content')
<img src="{{ asset("imgs/1.svg") }}" alt="" class="w-full">
<section class="p-6 bg-white min-h-[500px]">
    @if(session('success'))
    <div id="successMessage" role="alert" class="rounded-xl border  bg-[#EE626B] p-4 mx-auto mt-3" style="width: 300px; position: fixed; left: 50%; transform: translateX(-50%); top: 20px;z-index: 999;" data-aos="fade-up">
      <div class="flex items-start gap-4">
        <span class="text-white">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
        </span>
    
        <div class="flex-1">
          <strong class="block font-medium text-white"> Success </strong>
    
          <p id="successMessageText" class="mt-1 text-sm text-white">{{ session('success') }}</p>
        </div>
    
        <button id="closeSuccessMessage" class="text-white transition hover:text-gray-600">
          <span class="sr-only">Dismiss popup</span>
    
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
    
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.getElementById('successMessage');
        const successMessageText = document.getElementById('successMessageText');
        const closeSuccessMessage = document.getElementById('closeSuccessMessage');
    
        setTimeout(function() {
          successMessage.style.display = 'none';
        }, 4000);
    
        closeSuccessMessage.addEventListener('click', function() {
          successMessage.style.display = 'none';
        });
      });
    </script>
    @endif
    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded max-w-md mx-auto mb-4 text-center">
        {{ session('error') }}
    </div>
    @endif
    @php
        $topAction = App\Models\Game::where('category','action')->where('top','yes')->get();
        $topSport = App\Models\Game::where('category','sport')->where('top','yes')->get();
    @endphp
    <div class="max-w-4xl mx-auto mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-green-50 border border-green-300 rounded-lg p-3">
            <h3 class="font-bold text-green-700 text-sm uppercase">Top 3 Action</h3>
            @if($topAction->isEmpty())
                <p class="text-gray-500 text-xs mt-1">None selected</p>
            @else
                <ul class="mt-1 text-sm">
                    @foreach($topAction as $i => $g)
                    <li class="text-gray-700">#{{ $i+1 }} {{ $g->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="bg-green-50 border border-green-300 rounded-lg p-3">
            <h3 class="font-bold text-green-700 text-sm uppercase">Top 3 Sport</h3>
            @if($topSport->isEmpty())
                <p class="text-gray-500 text-xs mt-1">None selected</p>
            @else
                <ul class="mt-1 text-sm">
                    @foreach($topSport as $i => $g)
                    <li class="text-gray-700">#{{ $i+1 }} {{ $g->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="container mx-auto text-black">
        <form action="{{ route('modifie') }}" method="GET" class="mb-4 flex flex-wrap gap-2">
            <input type="text" name="search" placeholder="Search games..." value="{{ request('search') }}" class="border-2 border-[#EE626B] px-4 py-2 rounded-l-2xl w-full outline-none sm:w-auto sm:flex-1">
            <select name="category" class="border-2 border-[#EE626B] px-3 py-2 rounded outline-none">
                <option value="">All categories</option>
                <option value="action" {{ request('category') === 'action' ? 'selected' : '' }}>Action</option>
                <option value="sport" {{ request('category') === 'sport' ? 'selected' : '' }}>Sport</option>
                <option value="top_action" {{ request('category') === 'top_action' ? 'selected' : '' }}>Top Action</option>
                <option value="top_sport" {{ request('category') === 'top_sport' ? 'selected' : '' }}>Top Sport</option>
            </select>
            <select name="sort" class="border-2 border-[#EE626B] px-3 py-2 rounded outline-none">
                <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name</option>
                <option value="prix" {{ request('sort') === 'prix' ? 'selected' : '' }}>Price</option>
            </select>
            <button type="submit" name="dir" value="{{ request('dir') === 'desc' ? 'asc' : 'desc' }}" class="bg-[#EE626B] text-white px-3 py-2 rounded hover:bg-[#c85d64] transition-all text-lg" title="{{ request('dir') === 'desc' ? 'Ascending' : 'Descending' }}">
                @if(request('dir') === 'desc')
                <i class="fa-solid fa-arrow-up-a-z"></i>
                @else
                <i class="fa-solid fa-arrow-down-z-a"></i>
                @endif
            </button>
            <button type="submit" class="bg-[#EE626B] text-white px-4 py-2 rounded hover:bg-[#c85d64] transition-all">Filter</button>
        </form>

        <p class="text-sm text-gray-500 mb-2">{{ $games->total() }} game(s) found</p>
        @if($games->isEmpty())
            <p class="text-gray-700 mb-2">No games found.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($games as $game)
                <div class="border-2 border-red-500 rounded-lg p-4 bg-white">
                    <h2 class="text-xl font-bold mb-2 uppercase">{{ $game["name"] }}</h2>
                    <p class="text-gray-700 mb-2">{{ $game["prix"] }} $</p>
                    <p class="text-gray-700 mb-2">{{ $game["desc"] }}</p>
                    <img class="h-40 w-full object-cover mb-4" src="{{ $game["image"] }}" alt="">
                    <div class="flex justify-between items-center">
                        <a href="{{ route("edit",$game->id) }}" class="text-blue-500 hover:underline"> <i class="fa-solid fa-pen-to-square"></i> Modify</a>
                        <form action="{{ route('games.toggleTop', $game->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="{{ $game->top === 'yes' ? 'text-green-500' : 'text-gray-400' }} hover:underline text-sm">
                                <i class="fa-solid fa-star"></i>
                            </button>
                        </form>
                        <form action="{{ route('games.toggleSolde', $game->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="{{ $game->solde ? 'text-yellow-500' : 'text-gray-400' }} hover:underline text-sm">
                                <i class="fa-solid fa-tags"></i>
                            </button>
                        </form>
                        <a href="{{ route("edit",$game->id) }}" class="text-blue-500 hover:underline text-sm"> <i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="showConfirmation('{{ route('games.destroy',$game->id) }}')" class="text-[#EE626B] hover:underline text-sm"> <i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $games->links() }}
            </div>
        @endif
    </div>

</section>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-8 rounded-lg">
        <p class="mb-4">Are you sure you want to delete this game?</p>
        <div class="flex justify-end">
            <button onclick="hideConfirmation()" class="mr-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">Cancel</button>
            <form id="deleteForm" method="POST" action="">
                @method("DELETE")
                @csrf
                <button type="submit" class="px-4 py-2 bg-[#EE626B] hover:bg-red-600 text-white rounded-lg">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showConfirmation(url) {
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = url;
        document.getElementById('confirmationModal').classList.remove('hidden');
    }

    function hideConfirmation() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }
</script>

@endsection
