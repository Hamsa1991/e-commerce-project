<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{

    /**
     * Store a newly created payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response {"transaction_id":"1202004040950"}
     */
    public function store(Request $request)
    {        
        //check credit card info here
        //if true
        if(true) {
            //create new payment
            $payment = new Payment;
            $payment->user_id = $request->user_id;            
            $payment->email = $request->email;
            $payment->amount = $request->amount;
            //set transaction id
            $transaction_id = $request->user_id . date('YmdHi');
            $payment->transaction_id = $transaction_id;
            //save payment
            if ($payment->save()) {
                //return transaction id in json format
                return response()->json([
                    'transaction_id' =>$transaction_id
                ], 201);
            }
        }
        return response()->json("Error", 400);
    }




}
