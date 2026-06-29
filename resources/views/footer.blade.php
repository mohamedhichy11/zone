<footer class="bg-black">
  <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
    <div class="absolute end-4 top-4 sm:end-6 sm:top-6 lg:end-8 lg:top-8">
      <a
        class="inline-block rounded-full bg-[#EE626B] p-2 text-white shadow transition hover:bg-[#c5646a] sm:p-3 lg:p-4"
        href="javascript:void(0);"
        onclick="scrollToTop()"
      >
        <span class="sr-only">Back to top</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </a>
    </div>

    <div class="lg:flex lg:items-end lg:justify-between">
      <div>
        <div class="flex justify-center text-teal-600 lg:justify-start">
          <img src="{{ asset("imgs/Design sans titre.png") }}" alt="" class="w-[150px]">
        </div>
        <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500 lg:text-left">
          Welcome to Zone ! We are your ultimate destination for the latest and greatest in gaming. Whether you're a hardcore gamer or just looking for some casual fun, we have everything you need to enhance your gaming experience.
        </p>
      </div>

      <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
        <li>
          <a class="text-[#EE626B] transition hover:text-[#EE626B]/75" href="/"> home </a>
        </li>
        <li>
          <a class="text-[#EE626B] transition hover:text-[#EE626B]/75" href="/games/action"> action </a>
        </li>
        <li>
          <a class="text-[#EE626B] transition hover:text-[#EE626B]/75" href="/games/sport"> sport </a>
        </li>
        @php $isLoggedIn = Auth::guard('web')->check() || Auth::guard('admin')->check(); @endphp
        @if(!$isLoggedIn)
        <li>
          <a class="text-[#EE626B] transition hover:text-[#EE626B]/75" href="/sign/createp"> Register </a>
        </li>
        @endif
      </ul>
    </div>
    <p class="mt-12 text-center text-sm text-gray-500 lg:text-right">
      Copyright &copy; 2024. All rights reserved.
    </p>
  </div>
</footer>

<script>
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
</script>
