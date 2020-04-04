<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/1/2020
 * Time: 8:14 PM
 */
?>
@extends('layouts.app')

@section('content')
@include('products.list')
{{$products->links()}}
@endsection
