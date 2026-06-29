@extends('homeG')
@section("title","modifier" )
@section('content')
<section class="py-8" style="position: relative;">
    <video autoplay loop muted class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('imgs/ghost-modern-warfare-2-moewalls-com.mp4') }}" type="video/mp4">
      
    </video>
    <div class="max-w-4xl mx-auto px-4 bg-white bg-transparent rounded-lg shadow-lg backdrop-blur-sm border">
        <div class="px-6 py-4">
            <h2 class="text-[40px]  text-center font-semibold text-white">{{ __('Modify game') }}</h2>

            <div class="mt-4">
                <form action="{{ route("update", $game->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-white ">Game title</label>
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="text" id="name" name="name" value="{{ $game->name }}" class="mt-1 p-2 border rounded-md w-full outline-none">
                    </div>

                    <div class="mb-4">
                        <label for="prix" class="block text-sm font-medium text-white ">game price</label>
                        @error('prix')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="text" id="prix" name="prix" value="{{ $game->prix }}" class="mt-1 p-2 border rounded-md w-full outline-none">
                    </div>

                    <div class="mb-4">
                        <label for="desc" class="block text-sm font-medium text-white ">Game description</label>
                        @error('desc')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <textarea id="desc" name="desc" rows="3" class="mt-1 p-2 border rounded-md w-full outline-none">{{ $game->desc }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-white ">Game image</label>
                        @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" class="mt-1 p-2 border rounded-md w-full outline-none">
                        @if($game->image)
                        <p class="text-gray-400 text-xs mt-1">Leave empty to keep current image</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-white outline-none">Game category</label>
                        @error('category')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="text" id="category" name="category" value="{{ $game->category }}" class="mt-1 p-2 border rounded-md w-full outline-none">
                    </div>

                    <button type="submit" class="px-10 py-2 bg-[#fff] text-black  hover:bg-[#000] hover:text-[#fff]">Modify</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
