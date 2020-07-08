@extends('layouts.master')

@section('content')

    @if($flash = session('update'))
            <div class="alert alert-success">
                <span>{{ $flash }}</span>
            </div>
    @endif

    <div class="text-center">
        <h6>Icone du vetements</h6>
    <img src="/icons/{{$clothing->icon}}.svg" style="width: 200px" class="rounded" alt="{{$clothing->icon}}">
    </div>

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
    <h6>Selectioner nouvelle icones</h6>
        <select name="icon" class="custom-select">
            <option value="tshirt">Tshirt</option>
            <option value="uniform">Chemise</option>
            <option value="suit">Veste</option>
            <option value="suit">Costume</option>
        </select>
  </div>

  <div class="form-group">
        <button class="btn btn-primary">Ajouter</button>
  </div>
</form>
    
@endsection