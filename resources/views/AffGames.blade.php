@extends('homeG')
@section("title",$categorie)
@section('content')

<img src="{{ asset("imgs/1.svg") }}" alt="" class="w-full">
<section class="">
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
  <h1 class="text-3xl font-bold text-center mb-6 uppercase text-[#EE626B]" data-aos="fade-up"> 
   {{ $categorie === 'all' ? 'All Games' : $categorie . ' category' }}
  </h1>

@if($categorie === 'all')
<div class="flex justify-center gap-4 mb-6" data-aos="fade-up">
  <a href="{{ url('/games?category=action') }}" class="px-6 py-2 rounded-full transform hover:scale-110 {{ request('category') === 'action' ? 'bg-[#EE626B] text-white shadow-lg' : 'bg-gray-200 text-black' }} hover:bg-[#EE626B] hover:text-white hover:shadow-lg transition-all duration-300">Action</a>
  <a href="{{ url('/games?category=sport') }}" class="px-6 py-2 rounded-full transform hover:scale-110 {{ request('category') === 'sport' ? 'bg-[#EE626B] text-white shadow-lg' : 'bg-gray-200 text-black' }} hover:bg-[#EE626B] hover:text-white hover:shadow-lg transition-all duration-300">Sport</a>
  <a href="{{ url('/games') }}" class="px-6 py-2 rounded-full transform hover:scale-110 {{ !request('category') ? 'bg-[#EE626B] text-white shadow-lg' : 'bg-gray-200 text-black' }} hover:bg-[#EE626B] hover:text-white hover:shadow-lg transition-all duration-300">All</a>
</div>
@endif
  <div class="container mx-auto">
    <form action="{{ $categorie === 'all' ? url('/games') : url('/games/' . $categorie) }}" method="GET" class="mb-6 flex max-w-md mx-auto" data-aos="fade-up">
      @if(request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      <input type="text" name="search" placeholder="Search {{ $categorie === 'all' ? 'games' : $categorie }} games..." value="{{ request('search') }}" class="border-2 border-[#EE626B] px-4 py-2 rounded-l-2xl w-full outline-none focus:ring-2 focus:ring-[#EE626B] focus:border-transparent transition-all duration-300">
      <button type="submit" class="bg-[#EE626B] text-white p-2 rounded-r-xl hover:bg-[#c85d64] hover:scale-105 transition-all duration-300"><i class="fa-solid fa-search"></i></button>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" data-aos="fade-up">
      @foreach ($mygames as $game)
      <div class="flex flex-col rounded overflow-hidden  mb-2" style="border:2px solid#EE626B">
        <img class="w-full h-80 object-cover" src="{{ $game["image"] }}" alt="Card image cap">
        <div class="px-6 py-4 flex-1">
          <div class="font-bold text-xl mb-2 text-[#EE626B] uppercase">{{ $game["name"] }}</div>
          <p class="text-gray-400 text-base">{{ $game["desc"] }}</p>
          <p class="text-black font-bold text-lg mt-2">Prix : {{ $game["prix"] }} $US</p>
        </div>
        <div class="px-6 pt-4 pb-2">
          <a href="{{ route('addToCart', ['id' => $game['id']]) }}" class="inline-block bg-[#EE626B] hover:bg-[#ea777f] text-white font-bold py-2 px-4 rounded hover:no-underline">
            Ajouter au panier
          </a>
        </div>
      </div>
      @endforeach
    </div>
    {{ $mygames->links() }}

  </div>
</section>
<img src="{{ asset("imgs/wave-haikei3.svg") }}" alt="" class="w-full">
@endsection
