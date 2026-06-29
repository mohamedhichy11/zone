@extends("homeG")
@section("title","Login")
@section("content")
<style>
  
</style>
<section class="relative min-h-screen flex flex-col md:flex-row">
    <!-- Container for form and video -->
    <div class="flex flex-col md:flex-row w-full bg-black">
        <!-- Video background -->
        <div class="w-full md:w-1/2 relative h-64 md:h-auto">
            <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop>
                <source src="{{ asset('imgs/call-of-duty-modern-warfare-ii-ghost-moewalls-com.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- Login form container -->
        <div class="w-full md:w-1/2 flex  justify-center p-4 mt-10 ">
            <div class="relative w-full max-w-md bg-black p-6 rounded-xl  h-[470px] animated-shadow" style="border:2px solid #EE626B" data-aos="fade-left">
                <h3 class="text-4xl font-semibold mb-6 text-center text-[#fff]">LOGIN</h3>
               
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-white text-sm mb-2">Email</label>
                        <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" class="w-full px-3 py-2  rounded-lg  text-white outline-none bg-black" style="border:2px solid #EE626B">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label class="block text-white text-sm mb-2">Password</label>
                       
                        <input type="password" name="password" placeholder="Your password" class="w-full px-3 py-2  rounded-lg text-white outline-none bg-black" style="border:2px solid #EE626B" >

                     
                @if(session('error'))
                    <p class="mt-2 text-[red]">
                        {{ session('error') }}
                    </p>
                @endif
                    </div>
    
                    <div class="mb-4">
                        <button type="submit" class="w-full bg-[#EE626B] text-white py-2 px-4 rounded-lg hover:bg-[#b64c53] mt-4">Login</button>
                    </div>
    
                    <div class="text-center">
                        <span class="text-white">YOU DON'T HAVE AN ACCOUNT?</span>
                        <a href="{{ route('createp') }}" class="text-[#EE626B] hover:underline hover:text-[#a2464c]">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
