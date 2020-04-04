<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/1/2020
 * Time: 8:25 PM
 */
?>

@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">SHOPPING CART</h1>
    </div>
</section>

<form method="post" action="/createOrder">
    {{csrf_field()}}
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    @if(isset($products) && count($products))
                        <?php $i = -1;?>
                       <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col"> Product</th>
                            <th scope="col" class="text-center"> Quantity</th>
                            <th scope="col" class="text-right"> Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <?php $i++;?>
                                <tr>
                                    <input name="product_id[<?= $i ?>]" type="hidden" value="{{$product->id}}">
                                    <td><a href="/product/{{$product->id}}">
                                            <input name="image<?= $i ?>" type="hidden" value="{{ asset($product->image)}}"/>
                                            <img src="{{asset($product->image)}}" width="130" height="130">
                                        </a>
                                    </td>
                                    <td><input name="name[<?= $i ?>]" type="hidden" value="{{$product->name}}">
                                        <a href="/product/{{$product->id}}">{{$product->name}}</a>
                                    </td>
                                    <td class="text-center"><input name="quantity[<?= $i ?>]" class="form-control" type="hidden" value="{{$quantities[$i]}}" width="50"/>{{$quantities[$i]}}</td>
                                    <td class="text-right"><input name="price[<?= $i ?>]" type="hidden" value="{{$product->price}}"/>{{$product->price}}$</td>
                                    {{--<td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>--}}
                                    <td></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <strong>Total Price</strong>
                                </td>
                                <td><input name="total_price" type="hidden" value="{{$total_price}}"><strong>{{$total_price}}$</strong></td>
                            </tr>
                        </tbody>
                    </table>

                        <div class="col-sm-12 col-md-6 text-right">
                            <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                        </div>
                    @else
                        <div class="col-sm-12 text-center">
                            <label>No Items!</label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>

@endsection