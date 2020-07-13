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

    <clothing-component></clothing-component>
    {{-- <h2>Choisir une quantiter</h2>
<h3>{{session('success')}}</h3>
    <div class="order-clothing-list">
        <ul class="list-clothing">
            @foreach ($clothings as $clothing)
                <li>
                <img src="/icons/{{$clothing->icon}}.svg" alt="">
                    <h3>
                        {{ $clothing->name }}
                    </h3>
                    <div>
                        <em>{{ $clothing->prix }}f</em>
                        <br>
                        <strong>
                            {{-- {{dd(get)}} --}}
           
<div id="footer">
    @include('includes.footer')
</div>
@endsection
