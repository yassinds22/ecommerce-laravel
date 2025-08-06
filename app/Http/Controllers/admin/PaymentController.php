<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
    // في PaymentController
public function createSession(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        $session = Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'حزمة البرمجة',
                'description' => 'وصف الحزمة المميزة',
                'images' => [asset('img/premium.png')],
            ],
            'unit_amount' => 4999, // 49.99$
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => route('cancel'),
    'metadata' => [
        'user_id' => 1,
        'product' => 'premium_package'
    ],
    'shipping_address_collection' => [
        'allowed_countries' => ['SA', 'AE', 'BH'],
    ],
    'automatic_tax' => ['enabled' => true],
]);

        // بدلاً من redirect
        return response()->json(['id' => $session->id]); // ← التعديل هنا

    } catch (ApiErrorException $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    

    public function success()
    {
        return view('success');
    }

    public function cancel()
    {
        return view('cancel');
    }
}