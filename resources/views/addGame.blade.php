

@extends('homeG')
@section("title","Add Game")
@section('content')
<img src="{{ asset("imgs/e3.svg") }}" alt="" class="w-full">
<section class="flex flex-col md:flex-row px-10 py-5 bg-[#EE626B] ">
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
    <div class="md:w-1/2 bg-black-100 p-8 bg-[#ffff] " >
        <div class="text-[40px] font-semibold mb-9 text-black text-center">{{ __('Add a New Game') }}</div>

        <form method="POST" action="/games" enctype="multipart/form-data" class="space-y-5 ">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-black">{{ __('Game Name') }}</label>
                <input type="text" name="name" class="mt-1 block w-full border border-black rounded-md  p-2 outline-none " >
                @error('name')
                   <span class="text-black text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="prix" class="block text-sm font-medium text-black">{{ __('Game Price') }}</label>
                <input type="text" name="prix" class="mt-1 block w-full border border-black rounded-md  p-2 outline-none">
                @error('prix')
                   <span class="text-black text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-black">{{ __('Game Category') }}</label>
                <select name="category" class="mt-1 block w-full  rounded-md border border-black  p-2 outline-none">
                    <option value="action">Action</option>
                    <option value="sport">Sport</option>
                </select>
                @error('category')
                    <span class="text-black text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="desc" class="block text-sm font-medium text-black">{{ __('Game Description') }}</label>
                <textarea name="desc" rows="4" class="mt-1 block w-full border border-black rounded-md p-2 outline-none"></textarea>
                @error('desc')
                     <span class="text-black text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-black">{{ __('Game Image') }}</label>
                <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" class="mt-1 block w-full border border-black rounded-md p-2 outline-none">
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 font-semibold tracking-widest bg-black  text-[#fff] hover:text-[#000] hover:bg-[#EE626B]  transition-all">{{ __('Add Game') }}</button>
            </div>
        </form>
    </div>

    <div class="md:w-1/2 bg-[#EE626B]  " >
        <img src="{{ asset("imgs/back4.jpg") }}" alt="Game Image" class="w-full h-full shadow-md object-cover  " >
    </div>
</section>
<img src="{{ asset("imgs/wave-haikei2.svg") }}" alt="" class="w-full">

@endsection
