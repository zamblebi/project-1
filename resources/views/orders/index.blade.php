@extends('layouts.app')

@section('content')
    @php
        $getSession = Session::get('cart');
        if($getSession){
            //$getQty  = $getSession->items;
            $getItems = $getSession->items;
        }
    @endphp

<div class="wrapper " id="app">
    <global-order></global-order>
</div>

<div id="footer">
    @include('includes.footer')
</div>
@endsection
