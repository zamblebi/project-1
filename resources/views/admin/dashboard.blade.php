@extends('layouts.master')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom du clients</th>
      <th scope="col">Adresse</th>
      <th scope="col">Prix total</th>
      <th scope="col">Livrer</th>
      <th scope="col">Valider</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
    <th scope="row">{{$order->id}}</th>
      <td>{{$order->user->firstName}}</td>
      <td>{{json_decode($order->adress_maps)->long_name}}</td>
      <td>{{$order->all_prices}}</td>
      <td>{{$order->deliver == 0 ? 'Non' : 'Oui' }}</td>
      <td>
      <form action="{{route('order_checked', $order->id)}}" method="post">
        <input type="hidden"  name="deliver">
        <button class="btn btn-success" type="submit">Livrer</button>
      </form>
      </td>
    </tr>
    @endforeach
    {{-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> --}}
  </tbody>
</table>

@endsection
