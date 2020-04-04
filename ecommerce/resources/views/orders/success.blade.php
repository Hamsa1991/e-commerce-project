<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/3/2020
 * Time: 5:19 PM
 */
?>
@extends('layouts.app')

@section('content')


    <div class="alert alert-success text-center">
        <h1>Payment was done, Thanks!</h1>
        <br><br>
        <h3>Transaction id:</h3>
        <br>
        <h3>{{$transaction_id}}</h3>
    </div>


@endsection
