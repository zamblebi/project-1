<?php

namespace App\Http\Controllers;


use App\Clothing;
use App\Order;
use Session;
use Illuminate\Http\Request;

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
        // $orders = new Order;
        // $orders->clothings();
        // foreach($order->clothing as $c){

        // }
       return view('orders.index', ['clothings' => $clothings]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function deliveryChoice(Request $request){
        
        $simplePrice = 2000;
        $expressPrice = 5000;
        return view('orders.delivery', ['simple' => $simplePrice, 'express' => $expressPrice]);
        
    }
    
    public function addDeliverySimple(Request $request){
        $simple = ['price' => 2000, 'type' => 'simple'];
        // $addSimple = Session::put('simple', $simple);
        $request->session()->put('simple', $simple);

        if(Session::has('simple')){
            if (Session::has('express')) {
                Session::forget('express');
            }
        //  dd(Session::get('simple'));
        }
        
        return redirect()->back();
    }
    // public function addDeliveryExpress(Request $request){
    //     $express = ['price' => 5000, 'type' => 'express'];
    //     // $addexpress = Session::put('express', $express);
    //     $request->session()->put('express', $express);

    //     if(Session::has('express')){
    //         if(Session::has('simple')){
    //             Session::forget('simple');
    //         }
    //     //  dd(Session::get('express'));
    //     }
        
    //     return redirect()->back();
    // }
    
    public function addDeliveryExpress(Request $request){
        $express = ['price' => 5000, 'type' => 'express'];
        
        $request->session()->put('express', $express);
        
        if(Session::has('express')){
            if(Session::has('simple')){
                Session::forget('simple');
          }
        // dd(Session::get('express'));
        }

        return redirect()->back();
    }
    
}
