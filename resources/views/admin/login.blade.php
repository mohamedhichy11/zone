@extends("homeG")
@section("title","Admin Login")
@section("content")
<section class="relative min-h-screen flex flex-col md:flex-row">
    <div class="flex flex-col md:flex-row w-full bg-black">
        <div class="w-full md:w-1/2 relative h-64 md:h-auto">
            <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop>
                <source src="{{ asset('imgs/call-of-duty-modern-warfare-ii-ghost-moewalls-com.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="w-full md:w-1/2 flex justify-center p-4 mt-10">
            <div class="relative w-full max-w-md bg-black p-6 rounded-xl h-[470px] animated-shadow" style="border:2px solid #EE626B" data-aos="fade-left">
                <h3 class="text-4xl font-semibold mb-6 text-center text-[#fff]">ADMIN LOGIN</h3>
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-white text-sm mb-2">Email</label>
                        <input type="email" name="email" placeholder="Admin Email" value="{{ old('email') }}" class="w-full px-3 py-2 rounded-lg text-white outline-none bg-black" style="border:2px solid #EE626B">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-white text-sm mb-2">Password</label>
                        <input type="password" name="password" placeholder="Password" class="w-full px-3 py-2 rounded-lg text-white outline-none bg-black" style="border:2px solid #EE626B">
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="w-full bg-[#EE626B] text-white py-2 px-4 rounded-lg hover:bg-[#b64c53] mt-4">Admin Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
