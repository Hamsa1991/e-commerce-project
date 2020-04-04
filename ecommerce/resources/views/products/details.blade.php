<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/1/2020
 * Time: 1:54 PM
 */
?>
@extends('layouts.app')

@section('content')
    @if(isset($product))
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{$product->name}}</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img class="img-fluid" src="{{asset($product->image)}}" />
                        <p class="text-center">Zoom</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <br>
                    <p class="price">{{$product->price}} $</p>
                    <br><br>


                    @if(Auth::check())
                        <button id="btn-{{$product->id}}" class="btn btn-success btn-lg addToCartBtn btn-block text-uppercase" role="button" data-target="#add_to_cart_popup">Add to Cart</button>
                    @endif


                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Fast delivery</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Secure payment</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+33 1 22 54 65 60</li>
                        </ul>
                    </div>


                    <div class="reviews_product p-3 mb-2 ">
                        3 reviews
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                        <a class="pull-right" href="#reviews">View all reviews</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">
                        {{$product->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('products.add_to_cart_popup')

    @endif



@endsection