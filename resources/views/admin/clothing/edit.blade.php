@extends('layouts.master')

@section('content')

<form action="{{ route('update-clothing', $clothing->id)}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Type de vetement </label>
    <input type="text" name="name" value="{{$clothing->name}}" class="form-control" id="exampleFormControlInput1" placeholder="Chemise">
    @error('name')
    <span style="color: red">
      Nom non valide
      </span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Prix du vetement </label>
<input type="prix" name="prix" value="{{$clothing->prix}}" name="{{$clothing->prix}}" class="form-control" id="exampleFormControlInput2" placeholder="2500">
    @error('prix')
    <span style="color: red">
      Valeur de prix non valide
      </span>
    @enderror
</div>

  <div class="form-group">
        <button class="btn btn-primary">Ajouter</button>
  </div>
</form>
    
@endsection