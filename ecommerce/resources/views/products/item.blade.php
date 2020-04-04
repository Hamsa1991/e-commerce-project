<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/1/2020
 * Time: 12:51 PM
 */
?>

<div class="col-md-2 column productbox">
    <a href="/product/{{$product->id}}">
        <div style="height: 200px;">
            <img  src="{{ asset($product->image) }}" class="img-responsive" width="200 height=200">
        </div>
    </a>
    <div class="producttitle"><a href="/product/{{$product->id}}">{{$product->name}}</a></div>
    <div class="productprice"><div class="pull-right">
            @if(Auth::check())
                <button id="btn-{{$product->id}}" class="btn btn-danger btn-sm addToCartBtn" role="button" data-target="#add_to_cart_popup">Add to Cart</button>
            @endif
        </div><div class="pricetext">{{$product->price}}$</div></div>
</div>
@include('products.add_to_cart_popup')