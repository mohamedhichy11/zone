@extends("homeG")
@section("title", "Sign Up")
@section("content")

<section class="relative min-h-screen flex justify-center items-center">
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
    <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop>
        <source src="{{ asset('imgs/ghost-modern-warfare-2-moewalls-com.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="relative w-full max-w-md bg-black rounded-xl p-8 mx-4" style="border-radius: 20px; background: transparent; backdrop-filter: blur(20px); border: 2px solid #EE626B; box-shadow: 0 0 10px rgba(0, 0, 0, .2); position: relative; top: -60px;">
        <h3 class="text-[40px] font-semibold mb-6 text-center text-[#fff]">SIGN UP</h3>
      
        <form action="{{ route('store') }}" method="post">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-100 text-sm mb-2">Name</label>
                <input type="text" name="nomP" placeholder="Your name" class="w-full px-3 py-2 border-2 border-[#EE626B] rounded-lg text-white focus:outline-none bg-transparent" value="{{ old('nomP') }}">
                @if ($errors->has('nomP'))
                    <span class="text-red-500 text-sm">{{ $errors->first('nomP') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-100 text-sm mb-2">Email</label>
                <input type="email" name="email" placeholder="Your Email" class="w-full px-3 py-2 border-2 border-[#EE626B] rounded-lg text-white focus:outline-none bg-transparent" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-100 text-sm mb-2">Password</label>
                <input type="password" name="password" placeholder="Your password" class="w-full px-3 py-2 border-2 border-[#EE626B] rounded-lg text-white focus:outline-none bg-transparent">
                @if ($errors->has('password'))
                    <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-100 text-sm mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm your password" class="w-full px-3 py-2 border-2 border-[#EE626B] rounded-lg text-white focus:outline-none bg-transparent">
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-[#EE626B] text-white py-2 px-4 rounded-lg hover:bg-[#bd545b]">Sign Up</button>
            </div>

            <div class="text-center">
                <span class="text-white">ALREADY HAVE AN ACCOUNT?</span>
                <a href="{{ route('login') }}" class="text-[#EE626B] hover:underline hover:text-[#b64d54]">Log in</a>
            </div>
        </form>
    </div>
</section>

@endsection
