@extends('homeG')
@section("title","card")
@section('content')
<img src="{{ asset("imgs/2.svg") }}" alt="" class="w-full">
<section class="flex flex-col min-h-[400px] px-4 md:px-8 lg:px-16 ">
    <div class="p-4 md:p-10 flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php 
                        $effectivePrice = $details['price'];
                        if(isset($details['solde']) && $details['solde']) {
                            $effectivePrice = $details['price'] * 0.7;
                        }
                        $total += $effectivePrice * $details['quantity'];
                    @endphp

                    <div class="bg-white p-4 rounded-lg" style="border:2px solid #EE626B ">
                        <img src="{{ $details['photo'] }}" alt="{{ $details['name'] }}" class="w-full h-[200px] mb-4 rounded-lg object-cover" >
                        <h2 class="text-lg font-semibold">{{ $details['name'] }}</h2>
                        @if(isset($details['solde']) && $details['solde'])
                            <p class="text-gray-700 text-[20px]">
                                <span class="text-gray-400 line-through text-sm">{{ $details['price'] }}-$</span>
                                <span class="text-[#EE626B] font-bold">{{ number_format($effectivePrice, 2) }}-$</span>
                                <span class="text-xs text-green-500">-30%</span>
                            </p>
                        @else
                            <p class="text-gray-700 text-[20px]">{{ $details['price'] }}-$</p>
                        @endif
                    
                        <form action="{{ url('remove-from-cart') }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button id="btn-supprime" type="button" class="remove-from-cart text-[#EE626B]  hover:text-white px-4 py-2 rounded-lg" style="border:2px solid #EE626B ">Supprimer</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>

        <style>
            #btn-supprime{
                background-color: white;
                transition: 0.5s ease;
            }
            #btn-supprime:hover{
                    background-color: #EE626B;
                    transition: 0.2s ease;
            }
        </style>

        <div class="mt-6">
          
            @if(session('cart') && count(session('cart')) > 0)
                @php
                    $promoDiscount = session('promo_discount', 0);
                    $finalTotal = $total - ($total * $promoDiscount / 100);
                @endphp

                @if(session('promo_code'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        Promo code <strong>{{ session('promo_code') }}</strong> applied! {{ session('promo_discount') }}% off
                        <form action="{{ route('cart.removePromo') }}" method="POST" class="inline ml-2">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline text-sm">Remove</button>
                        </form>
                    </div>
                @endif

                <div class="mb-4">
                    <form action="{{ route('cart.applyPromo') }}" method="POST" class="flex gap-2 max-w-md">
                        @csrf
                        <input type="text" name="code" placeholder="Enter promo code" class="border border-gray-300 rounded px-4 py-2 flex-1" required>
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Apply</button>
                    </form>
                </div>

                @if($promoDiscount > 0)
                    <div class="text-gray-500 text-lg">Subtotal: {{ number_format($total, 2) }}-$</div>
                    <div class="text-green-500 text-lg">Discount (-{{ $promoDiscount }}%): -{{ number_format($total * $promoDiscount / 100, 2) }}-$</div>
                @endif
                <div class="text-[30px] font-serif mt-2" data-aos="fade-up">Total: {{ number_format($finalTotal, 2) }}-$</div>
                <form action="{{ url('session') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_name" value="Game order">
                    <input type="hidden" name="total" value="{{ number_format($finalTotal, 2, '.', '') }}">
                    <button type="submit" id="btnCheckout" class="bg-[#EE626B] text-white px-10 py-2 rounded-lg hover:bg-[#ad494f] mt-2" data-aos="fade-up">Checkout</button>
                </form>
            @else
                <div class="text-[50px] font-semibold mt-4 text-[#EE626B] text-center" data-aos="fade-down">No items in cart</div>
                <a href="{{ url('/') }}" class=" bg-[#EE626B] hover:no-underline text-white px-4 py-2 rounded-lg mt-4  hover:bg-[#a6434a] transition duration-300 flex justify-center" data-aos="fade-down">Browse games</a>
            @endif
        </div>
    </div>

</section>
<img src="{{ asset("imgs/wave-haikei3.svg") }}" alt="" class="w-full">
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.remove-from-cart');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('form').submit();
                    }
                });
            });
        });
    });
</script>

@endsection
