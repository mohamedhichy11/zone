<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cart()
    {


         return view('cart');

    }

    public function addToCart($id)
    {


        $game = Game::find($id);
      

        $cart = session()->get('cart');

 
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $game->name,
                    "quantity" => 1,
                    "price" => $game->prix,
                    "photo" => $game->image,
                    "solde" => (bool)$game->solde
                ]
        ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

      
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart); 

            return redirect()->back()->with('success', ' added to cart successfully!');

        }

        
        $cart[$id] = [
            "name" => $game->name,
            "quantity" => 1,
            "price" => $game->prix,
            "photo" => $game->image,
            "solde" => (bool)$game->solde
        ];

        session()->put('cart', $cart); 

        return redirect()->back()->with('success', ' added to cart successfully!');



    }

public function removec(Request $request)
{
    if ($request->id) {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        session()->flash('success', 'Product removed successfully');
    }

   
    return redirect()->route('cart');
}

    public function applyPromo(Request $request)
    {
        $code = strtoupper(trim($request->code));

        if ($code !== 'HICHY2026') {
            return redirect()->back()->with('error', 'Invalid promo code.');
        }

        session()->put('promo_code', $code);
        session()->put('promo_discount', 5);

        return redirect()->back()->with('success', 'Promo code applied! You get 30% off!');
    }

    public function removePromo()
    {
        session()->forget('promo_code');
        session()->forget('promo_discount');

        return redirect()->back()->with('success', 'Promo code removed.');
    }
}
