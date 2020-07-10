@extends('layouts.app')


@section('content')
 <h1>{{__('Choisisssez un moyen de livraison')}}</h1>

 <div class="container-slots">
     <div class="simple">
        <strong>
            <em>Votre vetement sera livrer 48h apres recuperation</em>
        </strong>
    </div>
    <div class="express">
        <strong>
            <em>Votre vetement sera livrer 4h apres recuperation</em>
        </strong>
     </div>
 </div>

@include('includes.footer')
@endsection