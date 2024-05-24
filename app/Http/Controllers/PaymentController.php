<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Exception\CardException;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a charge or subscription using the Stripe API
            // Replace the following with actual payment processing logic
            $charge = \Stripe\Charge::create([
                'amount' => 1000, // amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Example Charge',
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
    return view('success'); // Adjust the view name as per your application
}
}

