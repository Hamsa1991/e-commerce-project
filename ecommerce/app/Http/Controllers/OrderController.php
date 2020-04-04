<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Http;
use Session;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get orders
        $orders = DB::table('orders')
            ->where('user_id',Auth::user()->id)
            ->whereNotNull('transaction_id')
            ->get();
        //return view
        return view('orders.orders_list', compact('orders'));
    }

    /**
     * Get data stored in shopping cart and view it in form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //define variables to store data
        $products = [];
        $quantities = [];
        $total_price = 0;
        //get data from shopping cart and store it in $products, $quantities, $total_price
        if(session()->has('shoppingCart')) {
            $data = session()->get('shoppingCart');
            foreach ($data as $value){
                //explode values for each row
                $info =  explode('-', $value);
                if($info[0] == Auth::user()->id) {
                    //values related to currently authenticated user
                    $product = DB::table('products')->find($info[1]);
                    $products[] = $product;
                    $quantities[] = $info[2];
                    //calculate total price
                    $total_price = $total_price + $product->price * intval($info[2]);
                }
            }
        }
        //return view
        return view('orders.shopping_cart', compact('products', 'quantities', 'total_price'));
    }

    /**
     * Store a newly created order in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        // Begin Transaction
        DB::beginTransaction();
        //save order without a transaction id
        $order = new Order;
        try {
            $order->total_price = doubleval($request->total_price);
            $order->user_id = Auth::user()->id;
            if ($order->save()) {
                //save values into pivot table order_product
                for ($index = 0; $index < count($request->product_id); $index++) {
                    $id = $request->product_id[$index];
                    $order->products()->attach($id, ['quantity' => $request->quantity[$index]]);
                }
                DB::commit();
            }
            return view('orders.checkout', compact('order'));
        }catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();
        }
    }


    /**
     * Post card and user information to api and update order's transaction_d
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout(Request $request){

        //get order to update
        $order = Order::find($request->order_id);
        // Begin Transaction
        DB::beginTransaction();
        try {
            //call api to create payment
            $response = Http::post('http://localhost:8001/api/createPayment',[
                'user_id' => $request->user_id,
                'email' => $request->email,
                'amount' => $request->amount,
                //send here other card data
            ]);
            //get transaction id from response
            $data = json_decode($response->getBody(), true); // returns array
            if($data) {
                $transaction_id = $data['transaction_id'];
            }

            //update order to add transaction id field

            if ($transaction_id) {
                $order->transaction_id = $transaction_id;
                $order->save();
                DB::commit();

                //empty shopping cart
                session()->forget('shoppingCart');

                //show success message
                return view("orders.success", compact('transaction_id'));
            }
        }catch(\Exception $e){
            // Rollback Transaction
            DB::rollback();
            //delete order
            if($order){$order->delete();}
            //show failure message
            return view("orders.fail");
        }

    }
}
