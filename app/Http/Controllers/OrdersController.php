<?php

namespace App\Http\Controllers;


use App\Clothing;
use App\Order;
use App\User;
use DB;
use Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderTicket;
use Notification;
use Illuminate\Support\Facades\Mail;

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


    public function getOrderOfUser(){
        $user = Auth::user()->id;
        $user_order = Order::where('user_id',$user)->orderBy('id', 'desc')->get();

        return response()->json($user_order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    public function getOrder(){
        $orders = Order::orderBy('id', 'desc')->get();

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
            // return dd($order->id);
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


    public function checked(Request $request,$id)
    {
        $order = Order::all();
        DB::table('orders')->where('id', $id)->update(['deliver' => 1]);
        // $order->update($request->all());
        // $order->update($request['deliver'] = $request->deliver);
        return back();
    }


    public function sendNotification(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->latest()->first();
        // $email
        // $order->find($user->id);
        Notification::route('mail', 'info@monpressing.ci')->notify(new OrderTicket($order));
        // dd("done");
        return redirect('/home');
    }



}
