@extends('layouts.master')

@section('content')
<form action="{{ url('/add-clothing')}}" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Type de vetement </label>
    <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Chemise">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Prix du vetement </label>
    <input type="prix" class="form-control" id="exampleFormControlInput1" placeholder="2500">
  </div>

  <div class="form-group">
        <button class="btn btn-primary">Ajouter</button>
  </div>
</form>
@endsection