@extends('layouts.master')

@section('content')

<h1>ID de la commande : {{$order->id}}</h1>

<p> <strong>Nom et prenom du client : </strong>  {{$order->user->firstName}} {{$order->user->lastName}}</p>
<p> <strong>Numero de telephone : </strong>  {{$order->user->phone_number}}</p>
<p> <strong>Date et horaire de recuperation </strong>  {{json_decode($order->deliverable_date)->date}} entre {{json_decode($order->deliverable_date)->slot}}</p>
<table class="table">

    
    <thead>
        <tr>
        <th>
            Nom du produit et service
        </th>
        <th>
            Categories
        </th>
        <th>
            Quantiter
        </th>
    </tr>
</thead>
<tbody>


    {{-- @foreach (json_decode($order->carts,true) as $i => $cart)
        <td>
            @foreach ($cart as $c => $ca)
            {{dd($c)}}
                
            @endforeach --}}

        </td>
        <td>
            {{-- {{$cart->product->category}} --}}
        </td>
        <td>
            {{-- {{$car}} --}}
        </td>
        {{-- @endforeach --}}
    </tbody>
</table>
    {{-- <p> <strong>nom de produit </strong>   </p> --}}
    {{-- <p> <strong>Date et horaire de recuperation </strong>   </p> --}}
        

<p> <strong>Adresse </strong>  {{json_decode($order->adress_maps)->long_name}} </p>
<p> <strong> </strong>  {{json_decode($order->adress_maps)->long_name}} </p>
<div>
    <form action="{{route('order.checked', $order->id)}}" method="post">
        @csrf
        <input type="hidden"  name="deliver" value="1">
        @if ($order->deliver == 0)
          <button class="btn btn-danger" type="submit">Pas encore livrer</button>
        @else
          <button class="btn btn-success" type="submit">Livrer</button>
        @endif
      </form>
      <br>
      <form action="{{ route('order.check_recup', $order->id) }}" method="post">
        @csrf
        <input type="hidden"  name="recuperation" value="1">
        @if ($order->recuperation == 0)
          <button class="btn btn-danger" type="submit">Pas encore recuperer</button>
        @else
          <button class="btn btn-success" type="submit">Recuperer</button>
        @endif
      </form>
</div>

@endsection