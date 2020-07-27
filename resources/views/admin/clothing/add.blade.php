@extends('layouts.master')

@section('content')
    @if($flash = session('status'))
        <div class="alert alert-success">
            <span>{{ $flash }}</span>
        </div>  
    @elseif($flash = session('delete'))
        <div class="alert alert-danger">
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



<form action="{{ route('add-clothing')}}" enctype="multipart/form-data" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Type de vetement </label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Chemise">
    @error('name')
    <span style="color: red">
      Nom non valide
      </span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Prix du vetement </label>
    <input type="prix" name="prix" class="form-control" id="exampleFormControlInput2" placeholder="2500">
    @error('prix')
    <span style="color: red">
      Valeur de prix non valide
      </span>
    @enderror
</div>
    <div class="form-group">
      <label for="image_clothing" class="image_clothing">Ajouter une image a l'article</label>
      <br>
       <input type="file" style="display: none;" name="image_clothing" id="image_clothing">
    </div>
    <div class="form-group">
      <label>Choisir une categorie *</label>
      <select class="custom-select" name="category_id" id="">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">
          {{ $category->name }}
        </option>
        @endforeach
      </select>
    </div>
  <div class="form-group">
        <button class="btn btn-primary">Ajouter</button>
  </div>
</form>

<br>
    <h6>Listes des vetements</h6>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
</thead>
<tbody>
    @foreach ($clothings as $clothing)
    <tr>
        <th scope="row">{{$clothing->id}}</th>
        <td>{{$clothing->name}}</td>
        <td>{{$clothing->prix}} f</td>
        <th>
        <a class="btn btn-success" href="{{route('edit-clothing', $clothing->id)}}">Modifier</a>
        </th>
        <th>
        <form action="{{route('delete-clothing', $clothing->id)}}" method="post">
            @csrf
            <button class="btn btn-danger">Supprimer</button>
        </form>
    </th>
      </tr>
      @endforeach
  </tbody>
</table>

@endsection