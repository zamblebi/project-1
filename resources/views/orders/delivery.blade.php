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


 <h1 class="delivery-title">{{__('Choisisssez un moyen de livraison')}}</h1>
    {{-- <p></p> --}}
            <div>
                <div class="total-price-delivery">
                    <div>
                        <h4>
                            Prix total avec la livraison :
                        </h4>
                    @if (!empty($totalPrice))
                        <strong>
                            <em>
                                {{$totalPrice}}
                            </em>
                        </strong>
                    @else
                        Moyen de livraison pas encore choix
                    @endif
                   
                    </div>

                    <div>
                        <h4>
                            Type de livraison choisie :
                        </h4>
                        @if (!empty($type))
                            <strong>
                                <em>{{$type}}</em>
                            </strong>
                        @else
                            Moyen de livraison pas encore choix
                        @endif 
                    </div>
                    {{-- {{Session::get('cart')->totalPrice }} --}}

                </div>

            </div>
 <div class="container-deliverys">
     <div class="simple">



         <div class="delivery">
            <h3>Simple</h3>
            <img class="icon-delivery" src="/icons/delivery.svg" alt="">
            <div class="small-datails">
                <strong>
                    <em>Votre vetement sera livrer 48h apres recuperation</em>
                </strong>
            </div>
            <div class="frais">
                
                <h4>Frais de transport : </h4> <em> {{$simple}} </em>
                
            </div>
            <a href="{{route('add.delivery.simple')}}" class="btn">Sélectionner</a>
         </div>
        </div>
        <div class="express">
            <div class="delivery">
                <h3>Express</h3>
                <img class="icon-delivery" src="/icons/express-delivery.svg" alt="">
                <div class="small-datails">
                    <strong>
                        <em>Votre vetement sera livrer 4h apres recuperation</em>
                    </strong>
                </div>
                <div class="frais">
                    <h4>Frais de transport : </h4> <em> {{$express}} </em>
                </div>
                <a href="{{route('add.delivery.express')}}" class="btn">Sélectionner</a>
            </div>
     </div>
 </div>

@include('includes.footer')
@endsection