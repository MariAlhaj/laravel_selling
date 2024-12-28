<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function processPayment(Request $request)
    {
        // Validate the input
        $request->validate([
            'stripeToken' => 'required',
            'amount' => 'required|numeric|min:0.50',
        ]);

        // Set Stripe Secret Key
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Create a charge
            $charge = Charge::create([
                'amount' => $request->amount * 100, // Convert to cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment Description',
            ]);

            return back()->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
