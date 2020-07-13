@extends('layouts.app')


@section('content')

@php

// $hasCart = Session::has('cart');
// $getPrice = Session::get('cart');

        if(Session::has('simple')){
            if(!empty($totalPrice = Session::get('simple')['price'] + Session::get('cart')->totalPrice)){
                $totalPrice = Session::get('simple')['price'] + Session::get('cart')->totalPrice;
            }
            
        }elseif (Session::has('express')) {
            if (!empty($totalPrice = Session::get('express')['price'] + Session::get('cart')->totalPrice)) {
                $totalPrice = Session::get('express')['price'] + Session::get('cart')->totalPrice;
            }
            
        }else {
            
        }

        //Type
        if(Session::has('simple')){
            $type = Session::get('simple')['type'];
        }elseif (Session::has('express')) {
            $type = Session::get('express')['type'];
        }
    
@endphp



@include('includes.footer')
@endsection