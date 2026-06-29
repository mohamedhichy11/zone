


<nav class="bg-black">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('imgs/Design sans titre.png') }}" class="h-[40px]" alt="Flowbite Logo" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Toggle Navigation</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-1 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
        <li>
          <a href="/" class="block py-2 px-3 text-white">Home</a>
        </li>
        <li>
          <a href="/games" class="block py-2 px-3 text-white rounded">Games</a>
        </li>
        <li>
          <a href="/cart" class="block py-2 px-3 text-white rounded"><i class="fa-solid fa-cart-shopping"></i> Card</a>
        </li>
        @php $isCustomer = Auth::guard('web')->check(); $isAdmin = Auth::guard('admin')->check(); @endphp
        @if(!$isCustomer && !$isAdmin)
        <li>
          <a href="{{ route('login') }}" class="block py-2 px-3 text-white bg-[#EE626B] rounded" id="login">Login</a>
        </li>
        @endif
        @if($isAdmin)
        <li>
          <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 text-white rounded"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
        </li>
        <li>
          <a href="{{ route('create') }}" class="block py-2 px-3 text-white rounded">Add game</a>
        </li>
        <li>
          <a href="{{ route('modifie') }}" class="block py-2 px-3 text-white rounded">Modify games</a>
        </li>
        <li>
          <a href="{{ route('admin.login.logout') }}" class="block py-2 px-3 text-white bg-[#EE626B] rounded">Logout</a>
        </li>
        @elseif($isCustomer)
        <li>
          <a href="/promo" class="block py-2 px-3 text-white rounded">Promotion</a>
        </li>
        <li>
          <a href="{{ route('login.logout') }}" class="block py-2 px-3 text-white bg-[#EE626B] rounded">Logout</a>
        </li>
        @endif
      </ul>
    </div>
    <!-- Right Sidebar -->
    <div id="right-sidebar" class="fixed inset-y-0 right-0 z-50 w-64 bg-black md:hidden transition-transform duration-300 transform translate-x-full">
      <!-- Close button -->
      <button id="close-sidebar" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-white focus:outline-none">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <!-- Sidebar Content -->
      <div class="p-4">
        <h3 class=" text-[30px] mb-4 font-semibold text-[#EE626B]">MENU</h3>
        <ul class="font-medium flex flex-col p-1 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
          <li>
            <a href="/" class="block  text-white mt-4">Home</a>
          </li>
          <li>
            <a href="/games" class="block text-white mt-4">Games</a>
          </li>
          <li>
            <a href="/cart" class="block  text-white mt-4 "><i class="fa-solid fa-cart-shopping"></i> Card</a>
          </li>
          @if(!$isCustomer && !$isAdmin)
          <li>
            <a href="{{ route('login') }}" class="block text-white mt-4" >Login</a>
          </li>
          @endif
          @if($isAdmin)
          <li>
            <a href="{{ route('admin.dashboard') }}" class="block text-white mt-4"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
          </li>
          <li>
            <a href="{{ route('create') }}" class="block  text-white mt-4">Add game</a>
          </li>
          <li>
            <a href="{{ route('modifie') }}" class="block  text-white mt-4 ">Modify games</a>
          </li>
          <li>
            <a href="{{ route('admin.login.logout') }}" class="block py-2 px-3 text-white bg-[#EE626B] rounded mt-4">Logout</a>
          </li>
          @elseif($isCustomer)
          <li>
            <a href="/promo" class="block  text-white mt-4">Promotion</a>
          </li>
          <li>
            <a href="{{ route('login.logout') }}" class="block py-2 px-3 text-white bg-[#EE626B] rounded mt-4">Logout</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('[data-collapse-toggle="navbar-default"]');
    const navbarDefault = document.getElementById('navbar-default');
    const rightSidebar = document.getElementById('right-sidebar');
    const closeSidebar = document.getElementById('close-sidebar');
    
    toggleButton.addEventListener('click', function() {
     
      rightSidebar.classList.toggle('translate-x-full');
    });

    closeSidebar.addEventListener('click', function() {
      rightSidebar.classList.toggle('translate-x-full');
    });
  });
</script>







 {{-- <header>
      
          <a href="/" class="logoLink">
            <img src="{{ asset("imgs/Light Green Purple Modern Game Logo (4).png") }}" alt=""  >
          </a>
     

        
                <nav class="navigation">
                    <a href="/games/action" class="a">ACTION</a>
                    <a href="/games/sport" class="a">SPORT</a>
                    <a  href="/cart" class="a">CARD</a>
                
                    

                    @guest
                    <a href="{{ route("login") }}" class="login_btn">Login</a>
                @endguest
                
                @auth
                @if(Auth::user()->is_admin)
                    <a href="{{ route('create') }}" class="a">ADD GAMES</a>
                    <a href="{{ route('modifie') }}" class="a">MODIFIER GAMES</a>
                    @else
                    <a  href="/promo" class="a">PROMO</a>
                    @endif
                    <a href="{{ route("login.logout") }}" class="login_btn">logout</a>
                 
                @endauth
                </nav>
               


                <div class="bars1">
                  <i class="fa-sharp fa-solid fa-bars" style="color: #ffffff;"></i>
                </div>


    </header>
    <script>
      document.addEventListener('scroll', function () {
    var header = document.querySelector('header');
    var scrollPosition = window.scrollY;

    if (scrollPosition > 0) {
        header.classList.add('header-scrolled');
    } else {
        header.classList.remove('header-scrolled');
    }
});

const menuHam= document.querySelector(".bars1")
const navLinks=document.querySelector(".navigation")
menuHam.addEventListener("click",()=>{
  navLinks.classList.toggle("mobile-menu")
})
    </script> --}}

 



    
  