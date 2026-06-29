<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class PayerController extends Controller
{
    public function session(Request $request)
{
    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    $productNames = []; 
    $total = 0; 

    if (session()->has('cart') && count(session('cart')) > 0) {
        foreach (session('cart') as $id => $details) {
            $effectivePrice = $details['price'];
            if (isset($details['solde']) && $details['solde']) {
                $effectivePrice = $details['price'] * 0.7;
            }
            $total += $effectivePrice * $details['quantity'];
            $productNames[] = $details['name'];
        }

        $promoDiscount = session('promo_discount', 0);
        if ($promoDiscount > 0) {
            $total = $total - ($total * $promoDiscount / 100);
        }
    } else {
        return redirect()->route('cart')->with('message', 'Your cart is empty.');
    }

    $totalCents = intval($total * 100);

    $session = \Stripe\Checkout\Session::create([
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        "name" => implode(', ', $productNames),
                    ],
                    'unit_amount' => $totalCents,
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url' => route('cart'),
    ]);

    session(['stripe_total' => $total, 'stripe_products' => session('cart')]);

    return redirect()->away($session->url);
}

    public function success()
    {
        $cart = session('stripe_products', []);
        $total = session('stripe_total', 0);

        if (Auth::guard('web')->check() && count($cart) > 0) {
            $order = Order::create([
                'user_id' => Auth::guard('web')->id(),
                'total' => $total,
                'status' => 'paid',
            ]);

            foreach ($cart as $id => $details) {
                $effectivePrice = $details['price'];
                if (isset($details['solde']) && $details['solde']) {
                    $effectivePrice = $details['price'] * 0.7;
                }
                OrderItem::create([
                    'order_id' => $order->id,
                    'game_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $effectivePrice,
                ]);
            }
        }

        session()->forget(['cart', 'stripe_total', 'stripe_products']);

        return redirect()->route('cart')->with('success', 'Payment successful! Your cart has been cleared.');
    }
}
