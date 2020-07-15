<?php

namespace App\Http\Controllers;


use App\Clothing;
use App\Order;
use App\User;
// use Session;
use Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clothings = Clothing::all();
        // $user = Order::all();
        // $orders->clothings();
        // $user = User::find(Auth::user()->id);
        // foreach($order->clothing as $c){
            // dd($user->orders);
            // foreach($user as $u){
            //     dd($u->id);

            // }
        // }
       return view('orders.index', ['clothings' => $clothings]);
    }

    public function getUser(){
        $user = Auth::user();

        return response()->json($user);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getOrder(){
        $orders = Order::all();

        return view('admin.dashboard', ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return redirect('/',['orders' => $orders]);
        // dd($orders->getAttributes());
        if(Auth::check())
        {
            $user = User::find(Auth::user()->id);
            
            $orders = new Order();
            $orders->create($request->all());

            // $user->order_id = 12;
            // $user->save();
            // $user-->save();
            // $user->orders()->associate(($orders));
            // return redire
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
   
  
    
}
