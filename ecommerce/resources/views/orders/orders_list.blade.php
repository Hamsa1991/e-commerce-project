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
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Orders</h1>
        </div>
    </section>
    <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if(isset($orders))
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col"> </th>
                                        <th scope="col" > Transaction ID</th>
                                        <th scope="col" class="text-center"> Date/Time</th>
                                        <th scope="col" class="text-right"> Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td></td>
                                            <td>{{$order->transaction_id}}</td>
                                            <td class="text-center">{{date($order->updated_at)}}</td>
                                            <td class="text-right">{{$order->total_price}} $</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                            <div class="col-sm-12 text-center">
                                <label>No Orders!</label>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

@endsection
