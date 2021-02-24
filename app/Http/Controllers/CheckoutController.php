<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function makePayment(Request $request)
    {   
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "myr",
                "source" => $request->stripeToken,
                "description" => "Top up for soultrade." 
        ]);

        $affected = DB::update(
            'update users set balance = balance + 100 WHERE id = ?',
            [auth()->user()->id]
        );
        $request->session()->flash('success', 'Balance has been updated');

        return back();
    }
}