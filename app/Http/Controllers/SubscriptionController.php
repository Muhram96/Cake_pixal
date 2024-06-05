<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class SubscriptionController extends Controller
{
    public function index()
    {
        // Set your Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create or retrieve the PaymentIntent
        $intent = PaymentIntent::create([
            'payment_method_types' => ['card'],
        ]);

        return view('subscription', ['intent' => $intent]);
    }
    public function subscribe(Request $request)
    {
        $user = $request->user();
        $user->newSubscription('default', 'plan_id')->create($request->paymentMethod);
        return redirect('/dashboard')->with('success', 'Subscription successful!');
    }

    public function cancelSubscription(Request $request)
    {
        $user = $request->user();
        $user->subscription('default')->cancel();
        return redirect('/dashboard')->with('success', 'Subscription canceled!');
    }
}
