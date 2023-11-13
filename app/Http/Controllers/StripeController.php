<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function index()
    {
        return view("/cart");
    }
    public function checkout(Request $request)
    {
        $productId = $request->input('id');
        $product = Catalogue::find($productId);
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success', ['product_id' => $productId]),
            'cancel_url' => route('cart'),
        ]);
        return redirect()->away($session->url);
    }
    public function success(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            // Retrieve additional information as needed from the Stripe session
            $paymentDetails = [
                'payment_id' => request('payment_intent'),
            ];
            $productId = $request->product_id;
            // Save user details and payment details to the UserDetail model
            Payment::create([
                'name' => $user->name,
                'payment' => "Success",
                'product_id'=> $productId,
                'user_id'=> Auth::user()->id,
                // Add more user details as needed
            ]);
        }

        return redirect("/checkoutSuccess");
    }
}
