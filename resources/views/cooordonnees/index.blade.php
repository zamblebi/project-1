@extends('layouts.app')

@section('content')


<div class="wrapper">
    <h1>Vos coordonnees</h1>
<strong>{{session('ok')}}</strong>

    <p>Votre Nom est : </p>
<form action="{{ url('/update', Auth::user()->id)}}" method="post">
       @csrf
   {{-- <input type="hidden" value="{{Auth::user()->id}}" name="id"> --}}
       {{-- {{$user->id}} --}}
       <div>
           <label for="lastName">
               Votre Nom
            </label>
            <input type="text" name="lastName" value="{{Auth::user()->lastName}}">
        </div>
        <div>
            <label for="firstName">
                Votre Prenom
            </label>
            <input type="text" name="firstName" value="{{Auth::user()->firstName}}">
        </div>
        <div>
            <label for="email">
                Votre Email
            </label>
            <input type="text" name="email" value="{{Auth::user()->email}}">
        </div>

        <div>
            <label for="phone_number">
                Votre Numero de telephone
            </label>
            <input type="text" name="phone_number" value="{{Auth::user()->phone_number}}">
        </div>
        
        {{-- <input type="hidden" value="{{$user->password}}" name="password"> --}}
        <div>
            <button type="submit">Modifier</button>
        </div>
        
        
    </form>
</div>
@endsection