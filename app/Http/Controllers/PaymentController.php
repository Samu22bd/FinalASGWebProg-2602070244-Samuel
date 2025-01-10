<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function showPayment($price){
        return view('payment/index', ['price' => $price]);
    }

    public function payment(Request $request){
        $pay = $request->input('registration_pay');
        $price = $request->input('registration_price');

        // dd($underpaid);
        if($pay < $price){
            $underpaid = $price - $pay;
            return back()->with('underpaid', ['underpay' => $underpaid]);
            // return back()->with('underpaid', sprintf('You are still underpaid: %d', $underpaid));
        }else if($pay > $price){
            $overpaid = $pay - $price;;
            return back()->with('overpaid', ['overpay' => $overpaid]);
            // return route('payment.showOverpay', ['overpay' => $overpaid, 'price' => $price]);
        }

        return view('home');
    }

    public function overpay(Request $request){
        $user = Auth::user();

        $coins = $request->overpay / 100;
        $user->coins += $coins;

        $user->save();

        return redirect()->route('home');
    }
}
