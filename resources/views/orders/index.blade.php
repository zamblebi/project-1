@extends('layouts.app')

@section('content')

<div class="wrapper ">
    <h2>Choisir une quantiter</h2>
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
                    </div>
                <br>
                    <button class="btn">Ajouter</button>
                </li>
            @endforeach
        </ul>
        
        <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <p>0f</p>
            <hr>
            <button class="btn">Calculer</button>
        </div>
    </div>
</div>

<div id="footer">
    @include('includes.footer')
</div>
@endsection