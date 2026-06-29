@extends("homeG")
@section("title","Promotions")
@section("content")

<section class="py-10 px-4 bg-black min-h-screen">
  <h1 class="text-4xl font-bold text-center text-[#EE626B] mb-2 uppercase" data-aos="fade-up">Promotions -30%</h1>
  <p class="text-center text-gray-400 mb-8" data-aos="fade-up">Discover our discounted games at -30% off!</p>

  @if($promoGames->isEmpty())
    <p class="text-center text-gray-500 mt-10">No promotions available at the moment.</p>
  @else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-7xl mx-auto" data-aos="fade-up">
      @foreach ($promoGames as $game)
      <div class="flex flex-col rounded overflow-hidden border-2 border-[#EE626B] bg-black">
        <div class="relative">
          <img class="w-full h-64 object-cover" src="{{ $game['image'] }}" alt="">
          <div class="absolute top-2 right-2 bg-[#EE626B] text-white text-sm font-bold px-3 py-1 rounded-full">-30%</div>
        </div>
        <div class="px-4 py-4 flex-1 flex flex-col">
          <h3 class="font-bold text-lg text-[#EE626B] uppercase">{{ $game['name'] }}</h3>
          <p class="text-gray-400 text-sm mt-1 flex-1">{{ $game['desc'] }}</p>
          <div class="mt-3">
            <span class="text-gray-500 line-through text-sm">{{ $game['prix'] }} $</span>
            <span class="text-white font-bold text-xl ml-2">{{ number_format($game['prix'] * 0.7, 2) }} $</span>
          </div>
          <a href="#" data-id="{{ $game['id'] }}" class="add-to-cart mt-4 block text-center bg-[#EE626B] hover:bg-[#c9656c] text-white font-bold py-2 px-4 rounded hover:no-underline transition">
            Add to Cart
          </a>
        </div>
      </div>
      @endforeach
    </div>
  @endif
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-to-cart').forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        var id = this.dataset.id;
        Swal.fire({
          icon: 'success',
          title: 'Game added to cart!',
          text: 'This game is on sale at -30%!',
          showConfirmButton: true,
          confirmButtonColor: '#EE626B'
        }).then(function() {
          window.location.href = '{{ route("addToCart", ["id" => "__ID__"]) }}'.replace('__ID__', id);
        });
      });
    });
  });
</script>
@endsection
