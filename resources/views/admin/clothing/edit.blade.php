@extends('layouts.master')

@section('content')

    @if($flash = session('update'))
            <div class="alert alert-success">
                <span>{{ $flash }}</span>
            </div>
    @endif

    <style>
         .image_clothing{border-radius: 7px;
    background-color: orange;
    padding: 10px;
    cursor: pointer; 
    color: #fff
}
    </style>








    <div class="text-center">
        <h6>Image du vetements</h6>
    <img src="/{{$clothing->image}}" style="width: 200px" class="rounded" alt="{{$clothing->icon}}">
    </div>

<form action="{{ route('update-clothing', $clothing->id)}}" enctype="multipart/form-data" method="post">
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
<p>Categorie Choisi : <strong>{{$clothing->category->name}}</strong> </p>
    <h6>Selectioner nouvelle categorie : </h6>
        <select class="custom-select" name="category_id" id="">

        @foreach ($categories as $category)
        <option value="{{ $category->id }}">
          {{ $category->name }}
        </option>
        @endforeach
      </select>
  </div>

  <div class="form-group">
      <label for="image_clothing" class="image_clothing">Changer d'image</label>
      <br>
  <input type="file" style="display: none;" id="image_clothing" name="image_clothing" value="{{ $clothing->image }}" placeholder="Choisir une image">
  </div>

  <div class="form-group">
        <button class="btn btn-primary">Modifier</button>
  </div>
</form>
    
@endsection