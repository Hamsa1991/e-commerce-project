<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/2/2020
 * Time: 4:15 PM
 */
?>
@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-4 order-md-2 mb-4">
                <h4 class="mb-3">Payment</h4>
            <form class="needs-validation" novalidate="" method="post" action="/checkout">
                {{csrf_field()}}
                    <input type="hidden" value="{{$order->id}}" name="order_id">
                    <input type="hidden" value="{{$order->total_price}}" name="amount">
                    <input type="hidden" value="{{$order->user_id}}" name="user_id">
                <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email">
                    <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="cc-number">Credit Card Number</label>
                        <input name="number" type="text" class="form-control" id="cc-number" placeholder="" required="" value="">
                        <div class="invalid-feedback"> Credit card number is required </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input name="cvv" type="text" class="form-control" id="cc-cvv" placeholder="" required="" value="">
                        <div class="invalid-feedback"> Security code required </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cc-name">Holder Name</label>
                        <input name="holder_name" type="text" class="form-control" id="cc-name" placeholder="" required="" value="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback"> Name on card is required </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cc-expiration">Expiration Month</label>
                        <input name="month" type="number" min="1" max="12" class="form-control" id="cc-expiration" placeholder="" required="" value="1">
                        <div class="invalid-feedback"> Expiration Month required </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cc-expiration">Expiration Year</label>
                        <input name="year" type="number" min="{{date('Y')}}" class="form-control" id="cc-expiration" placeholder="" required="" value="{{date('Y')+1}}">
                        <div class="invalid-feedback"> Expiration Year required </div>
                    </div>
                </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay for Order</button>
                </form>
        </div>
    </div>
@endsection