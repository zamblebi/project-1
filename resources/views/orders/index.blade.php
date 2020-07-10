@extends('layouts.app')

@section('content')
    @php
        $getSession = Session::get('cart');
        if($getSession){
            $getQty = $getSession->items;
        }
    @endphp

<div class="wrapper ">
    <h2>Choisir une quantiter</h2>
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
                        <em>Quantiter : {{!empty($getSession->items[$clothing->id]['qty']) ? $getSession->items[$clothing->id]['qty'] : '0'}}</em>
                        </strong>
                    </div>
                <br>
                <a href="{{route('cart', $clothing->id)}}" class="btn">Ajouter</a>
                </li>
            @endforeach
        </ul>
        
        <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <strong>
                <p>Quantiter Total : {{Session::has('cart') ? Session::get('cart')->totalQuatity : '' }}</p>
                    <p>{{Session::has('cart') ? Session::get('cart')->totalPrice : '0' }}f</p>
            </strong>
            <p>

                @if(isset($getQty))
                    @foreach($getQty as $item)
                        <p>{{$item['item']['name']}} quanttiter : {{$item['qty']}} </p>
                    @endforeach
                @else
                  <p>Vous n'avez pas encore selectionner de</p>
                @endif

            </p>
            <hr>
        <a href="{{route('slots.choice')}}" class="btn">Passer la commande</a>
        </div>
    </div>
</div>

<div id="footer">
    @include('includes.footer')
</div>
@endsection