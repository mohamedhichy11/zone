@extends("homeG")
@section("title","home")
@section("content")

<section class="bg-black">
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
  <div class="gap-16 items-center py-3 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
    <div class="font-light text-gray-100 sm:text-lg dark:text-gray-400" data-aos="fade-up">
      <h2 class="mb-4 text-3xl  sm:text-4xl  tracking-tight font-extrabold text-white">Welcome to <span class="bg-[#EE626B] p-2">Zone</span></h2>
      <p class="mb-3">Welcome to Zone! We are your ultimate destination for the latest and greatest in gaming. Whether you're a hardcore gamer or just looking for some casual fun, we have everything you need to enhance your gaming experience.</p>
      <p class="mb-3">From the newest releases to timeless classics, our collection spans across all genres and platforms. Our team is passionate about gaming and is here to provide you with expert advice, top-notch customer service, and an unparalleled selection of games and accessories.</p>
      <p class="mb-3">Join our community and level up your gaming with us. Dive into the world of gaming at Zone, where every game is a new adventure waiting to be explored.</p>
      <a href="/games/action" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-[#EE626B] rounded-lg" style="text-decoration: none" >Shop Now</a>
    </div>
    <div class="grid grid-cols-2 gap-4 mt-8">
      <img class="w-full rounded-lg border animated-shadow" src="https://qph.cf2.quoracdn.net/main-qimg-b442c2b3bbf4454cbc99ef7d5e581f43" style="border-color: #EE626B !important;" alt="gaming content 1" data-aos="fade-up">
      <img class="mt-4 w-full lg:mt-10 rounded-lg border animated-shadow" src="https://i.pinimg.com/736x/f9/d1/45/f9d145569662bbe830f2f0b47d5dda8f.jpg" style="border-color: #EE626B !important;" alt="gaming content 2" data-aos="fade-down">
    </div>
  </div>
</section>


<style>
  @keyframes shadow-animation {
    0% {
      box-shadow: 0px 0px 20px 0px rgba(238, 98, 107, 0.5);
    }
    50% {
      box-shadow: 0px 0px 50px 0px rgba(238, 98, 107, 0.7);
    }
    100% {
      box-shadow: 0px 0px 20px 0px rgba(238, 98, 107, 0.5);
    }
  }
  
  .animated-shadow {
    animation: shadow-animation 3s infinite;
  }
</style>




<img src="{{ asset("imgs/wave-haikei4.svg") }}" alt="" class="w-full">
{{-- message --}}
<section>
  <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 sm:py-12 lg:px-8">
    <header class="text-center">
      <h1 class="text-xl font-bold text-[#EE626B] md:text-[50px] sm:text-3xl" data-aos="fade-up">TOP 3 ACTION GAMES</h1>
      <p class="mx-auto mt-4 max-w-md text-gray-500" data-aos="fade-up">Here are the top 3 action games that you shouldn't miss out on!</p>
    </header>
    <ul class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-3" data-aos="fade-up">
      @php $counter = 1; @endphp
      @foreach ($mytopgames as $game)
        <li>
          <div class="group relative block">
            <img src="{{ $game['image'] }}" alt="" class="h-[500px] w-full object-cover transition duration-500 group-hover:opacity-90" />
            <div class="absolute top-0 left-0 bg-[#EE626B] text-white px-3 py-1 text-sm font-bold">
              Top {{ $counter }}
            </div>
            <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
              <h3 class="text-xl font-medium text-white uppercase">{{ $game['name'] }}</h3>
              <button 
                onclick="addToCart('{{ route('addToCart', ['id' => $game['id']]) }}')" 
                class="mt-1.5 inline-block bg-[#EE626B] px-5 py-3 text-xs font-medium uppercase tracking-wide text-white hover:bg-[#ac4148]">
                Add to Cart
              </button>
            </div>
          </div>
        </li>
        @php $counter++; @endphp
      @endforeach
    </ul>
  </div>
</section>

<div id="alertModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-lg max-w-md w-full mx-4">
    <div class="flex items-start gap-4">
      <span class="text-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </span>
      <div class="flex-1">
        <strong class="block font-medium text-gray-900">Changes saved</strong>
        <p class="mt-1 text-sm text-gray-700">Your product changes have been saved.</p>
        <div class="mt-4 flex gap-2">
          <a href="/cart" class="inline-flex items-center gap-2 rounded-lg bg-[#EE626B] px-4 py-2 text-white hover:bg-[#af434a]" style="text-decoration: none">
            <span class="text-sm">Go to Cart</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
          </a>
          <button onclick="hideAlert()" class="block rounded-lg px-4 py-2 text-gray-700 transition hover:bg-gray-50">
            <span class="text-sm">Dismiss</span>
          </button>
        </div>
      </div>
      <button onclick="hideAlert()" class="text-gray-500 transition hover:text-gray-600">
        <span class="sr-only">Dismiss popup</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</div>




<script>
function addToCart(url) {

  fetch(url)
    .then(response => {
      if (response.ok) {
        setTimeout(() => {
          document.getElementById('alertModal').classList.remove('hidden');
          setTimeout(() => {
            hideAlert();
          }, 5000); 
        }, 0);
      }
    });
}

function hideAlert() {
  document.getElementById('alertModal').classList.add('hidden');
}

</script>

<img src="{{ asset("imgs/wave-haikei.svg") }}" alt="" class="w-full">


<section class="bg-[#EE626B] ">
  <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 sm:py-12 lg:px-8 ">
    <header class="text-center">
      <h1 class="text-xl font-bold text-[#fff] md:text-[50px] sm:text-3xl" data-aos="fade-up">TOP 3 SPORT GAMES</h1>
      <p class="mx-auto mt-4 max-w-md text-white" data-aos="fade-up">Here are the top 3 sports games that you shouldn't miss out <br> on!</p>
    </header>
    <ul class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-3" data-aos="fade-up">
      @php $counter = 1; @endphp
      @foreach ($mytopgames2 as $game)
        <li>
          <div class="group relative block">
            <img src="{{ $game['image'] }}" alt="" class="h-[500px] w-full object-cover transition duration-500 group-hover:opacity-90" />
            <div class="absolute top-0 left-0 bg-[#fff] text-[#EE626B] px-3 py-1 text-sm font-bold">
              Top {{ $counter }}
            </div>
            <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
              <h3 class="text-xl font-medium text-white uppercase">{{ $game['name'] }}</h3>
              <button 
                onclick="addToCart('{{ route('addToCart', ['id' => $game['id']]) }}')" 
                class="mt-1.5 inline-block bg-[#fff] px-5 py-3 text-xs font-medium uppercase tracking-wide text-[#EE626B] hover:bg-[#f4cdd0]">
                Add to Cart
              </button>
            </div>
          </div>
        </li>
        @php $counter++; @endphp
      @endforeach
    </ul>
  </div>
</section>


{{-- action  --}}
<img src="{{ asset("imgs/wave-haikei2.svg") }}" alt="" class="w-full">


<section class="bg-black" >
  <div class="mx-auto max-w-screen-2xl px-4 py-8 sm:px-6 lg:px-8" data-aos="fade-up">
    <div class="grid grid-cols-1 lg:h-screen lg:grid-cols-2">
      <div class="relative z-10 lg:py-16">
        <div class="relative h-64 sm:h-80 lg:h-full">
          <img
            alt=""
            src="{{ asset('imgs/back2.jpg') }}"
            class="absolute inset-0 h-full w-full object-cover  "
          />
        </div>
      </div>

      <div class="relative flex items-center bg-[#EE626B] ">
        <span
          class="hidden lg:absolute lg:inset-y-0 lg:-start-16 lg:block lg:w-16 lg:bg-[#EE626B]"
        ></span>

        <div class="p-8 sm:p-16 lg:p-24">
          <h2 class="text-2xl font-bold sm:text-3xl text-red-50">
            Welcome to <span class="bg-black p-2">Zone</span>: Your Ultimate Online Gaming Store
          </h2>

          <p class="mt-4 text-white">
            At Zone, we are passionate about gaming. Our mission is to provide gamers with the latest and greatest in gaming hardware, software, and accessories. Whether you're a casual player or a competitive eSports enthusiast, you'll find everything you need right here.
            <br>
            Join our community of gamers and stay ahead with the latest releases, exclusive deals, and expert advice from fellow enthusiasts. At Zone, gaming is not just a hobby; it's a lifestyle.
          </p>

          <a href="/games/action" class="mt-8 inline-block bg-black px-12 py-3 font-medium text-[#fff] hover:text-[#000] hover:bg-[#fff]  transition-all" style="text-decoration: none;">
            Shop now
        </a>
        
        
        </div>
      </div>
    </div>
  </div>
</section>



<style>

@keyframes shadowPulse {
  0%, 100% {
    box-shadow: 0 0 20px 5px rgba(238, 98, 107, 0.5);
  }
  50% {
    box-shadow: 0 0 30px 10px rgba(238, 98, 107, 1);
  }
}

.shadow-animate {
  animation: shadowPulse 2s infinite;
}

</style>

<img src="{{ asset("imgs/wave-haikei4.svg") }}" alt="" class="w-full">
<section class="bg-white">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8" data-aos="fade-up">
    <div class="mx-auto max-w-3xl text-center">
      <h2 class="text-6xl font-bold text-[#EE626B] sm:text-5xl ">Preferred by Gamers Worldwide</h2>

      <p class="mt-4 text-gray-500 sm:text-xl">
        Join millions of gamers who trust us for their gaming needs.
         From the latest titles to classic favorites, we offer an unparalleled shopping experience.
      </p>
    </div>

    <div class="mt-8 sm:mt-12" data-aos="fade-up">
      <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:divide-x sm:divide-gray-100">
        <div class="flex flex-col px-4 py-8 text-center">
          <dt class="order-last text-lg font-medium text-gray-500">Games Sold</dt>

          <dd class="text-4xl font-extrabold text-[#EE626B] md:text-5xl">3.2m</dd>
        </div>

        <div class="flex flex-col px-4 py-8 text-center">
          <dt class="order-last text-lg font-medium text-gray-500">Available Titles</dt>

          <dd class="text-4xl font-extrabold text-[#EE626B] md:text-5xl">1500+</dd>
        </div>

        <div class="flex flex-col px-4 py-8 text-center">
          <dt class="order-last text-lg font-medium text-gray-500">Satisfied Customers</dt>

          <dd class="text-4xl font-extrabold text-[#EE626B] md:text-5xl">86</dd>
        </div>
      </dl>
    </div>
  </div>
</section>
<img src="{{ asset("imgs/wave-haikei3.svg") }}" alt="" class="w-full">


 
@endsection
