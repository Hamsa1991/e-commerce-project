<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use Session;

class ProductController extends Controller
{
    /***
     * Display a listing of the products.
     *
     * @param int $limit
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($limit = 20, Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        //get products
        $products = DB::table('products')->simplePaginate($limit);
        //return view
        return view('products.products', compact('products', 'limit', 'page'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->find($id);
        return view('products.details', compact('product'));
    }

    /***
     * Sort products by name
     *
     * @param $limit
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function sortByName($limit, $page){
        //get products
        $products = DB::table('products')
            ->orderBy('name')
            ->limit($limit)->offset(($page - 1) * $limit)->simplePaginate($limit);
        //return view
        return view('products.products', compact('products', 'limit', 'page'));
    }

    /***
     * Sort products by price
     *
     * @param $limit
     * @param $page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sortByPrice($limit, $page){
        //get products
        $products = DB::table('products')
            ->orderBy('price')
            ->limit($limit)->offset(($page - 1) * $limit)->simplePaginate($limit);
        //return view
        return view('products.products', compact('products', 'limit', 'page'));
    }

    /***
     * Filter products by a specified price range
     *
     * @param $limit
     * @param $page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByPrice($limit, $page, Request $request){
        //filter by price
        $price1=$request->amount1;
        $price2=$request->amount2;

        $products = DB::table('products')
            ->whereBetween('price', [$price1, $price2])
            ->orderBy('price')->limit($limit)->offset(($page - 1) * $limit)->simplePaginate($limit);
        //return view
        return view('products.products', compact('products', 'limit', 'page', 'price1', 'price2'));

    }

    /***
     * Filter products by product name
     *
     * @param $limit
     * @param $page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByName($limit, $page, Request $request){
        //get products
        $products = DB::table('products')
            ->where('name', 'like', '%' . $request->name_filter . '%')
            ->limit($limit)->offset(($page - 1) * $limit)->simplePaginate($limit);

        return view('products.products', compact('products', 'limit', 'page'));
    }

    /***
     * Add product to shopping cart
     *
     * @param Request $request
     * @return session('shoppingCart')|null
     */
    public function addToCart(Request $request)
    {
        //use session to store products and quantity for each user
        $key = Auth::user()->id;
        $inCart = false;
        //check if item is already in cart
        if(session()->has('shoppingCart')) {
            $data = session()->get('shoppingCart');
            foreach ($data as $value) {
                $info = explode('-', $value);
                if($info[0] == $key && $info[1] == $request->product_id){
                    $inCart = true;
                    break;
                }
            }
        }
        //insert item into cart
        if(!$inCart) {
            $data = $key . "-" . $request->product_id . "-" . $request->quantity;
            Session::push('shoppingCart', $data);
            return session()->get('shoppingCart');
        }
        return null;
    }
}
