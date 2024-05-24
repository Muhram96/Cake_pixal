<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Exception\CardException;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $plans = [
            ['name' => 'Basic Plan', 'price' => 999],  // price in cents
            ['name' => 'Standard Plan', 'price' => 1999],
            ['name' => 'Premium Plan', 'price' => 2999],
        ];

        return view('payment', ['plans' => $plans]);
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount, // amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => $request->plan,
            ]);

            // Payment was successful
            return redirect()->route('payment.success')->with('success', 'Payment successful!');
        } catch (CardException $e) {
            // Payment failed (e.g., card declined)
            return redirect()->route('payment.form')->with('error', $e->getMessage());
        }
    }

    public function paymentSuccess()
    {
        return view('success');
    }
}
