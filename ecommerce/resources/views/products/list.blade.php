<?php
/**
 * Created by PhpStorm.
 * User: hamsa
 * Date: 4/1/2020
 * Time: 12:37 PM
 */

?>
<input type="hidden" name="page" id="page" value="{{$page}}">
<input type="hidden" name="limit" id="limit" value="{{$limit}}">
@if(count($products))
    <div class="row search-controls">
        <div class="col-lg-3">
            <span class="float-left">Sort by:&nbsp;&nbsp;</span>
                <form action="/sortByPrice/{{$limit}}/{{$page}}" method="get" class="float-left">
                    <button type="submit" class="button btn-info" id="sort_by_price">Price</button>
                </form>
                <form action="/sortByName/{{$limit}}/{{$page}}" method="get" class="float-left" style="margin-left: 10px;">
                    <button type="submit" class="button btn-info" id="sort_by_name">Name</button>
                </form>
        </div>
        <div class="col-lg-7">
                <div class="row">
                    <div class="col-sm-6">
                        <span class="float-left">Filter by:&nbsp;&nbsp;</span>
                        <form action="/filterByName/{{$limit}}/{{$page}}" method="post">
                            {{csrf_field()}}
                            <input id="name_filter" type="text" name="name_filter" class="form-control float-left" value="{{old('name_filter')}}" required="" placeholder="product name" style="width:150px !important;height:30px !important;">
                            <input type="image" src="{{asset('search.png')}}" name="submit" class="float-left">
                        </form>
                    </div>
                    <div class="col-sm-6">
                        {{--<span class="float-left">Price:&nbsp;&nbsp;</span>--}}

                        <div class="slider-container">
                            <form action="/filterByPrice/{{$limit}}/{{$page}}" method="post">
                            {{csrf_field()}}
                                <div >
                                    @include('products.slider')
                                    <input type="image" src="{{asset('search.png')}}" name="submit" class="float-left search-price">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>
        <div class="col-lg-2 text-lg-right">

            <span >View&nbsp;</span>
                <select name="items" id="per_page_select" class="btn-info" onchange="this.form.submit()">
                    <option value="5" @if($limit == 5)selected @endif>5</option>
                    <option value="10" @if($limit == 10)selected @endif>10</option>
                    <option value="20" @if($limit == 20)selected @endif>20</option>
                </select>
            <span > &nbsp;Per page</span>

        </div>
    </div>
    <div class="list row">
        @foreach($products as $product)
            @include('products.item')
        @endforeach
    </div>
@endif
