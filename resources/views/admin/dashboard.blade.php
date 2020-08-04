@extends('layouts.master')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom et prénom du client</th>
      <th scope="col">Adresse</th>
      <th scope="col">Numero de téléphone</th>
      <th scope="col">Prix total</th>
      <th scope="col">Livrer</th>
      <th scope="col">Valider</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
    <th scope="row">{{$order->id}}</th>
    <td>{{$order->user->firstName}} {{$order->user->lastName}}</td>
      <td>{{json_decode($order->adress_maps)->long_name}}</td>
      <td>{{$order->user->phone_number}}</td>
      <td>{{$order->all_prices}}</td>
      <td>{{$order->deliver == 0 ? 'Non' : 'Oui' }}</td>
      <td>
      <form action="{{route('order.checked', $order->id)}}" method="post">
        @csrf
        <input type="hidden"  name="deliver" value="1">
        @if ($order->deliver == 0)
          <button class="btn btn-danger" type="submit">Pas encore livrer</button>
        @else
          <button class="btn btn-success" type="submit">Livrer</button>
        @endif
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
