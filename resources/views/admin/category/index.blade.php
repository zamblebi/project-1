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
<form action="{{ route('add-category')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom de la category</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Choisir une categorie">
    @error('name')
    <span style="color: red">
      Nom non valide
      </span>
    @enderror
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
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
</thead>
<tbody>
    @foreach ($categories as $category)
    <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->name}}</td>
        <th>
        <a class="btn btn-success" href="{{route('edit-category', $category->id)}}">Modifier</a>
        </th>
        <th>
        <form action="{{route('remove-category', $category->id)}}" method="post">
            @csrf
            <button class="btn btn-danger">Supprimer</button>
        </form>
    </th>
      </tr>
      @endforeach
  </tbody>
</table>

@endsection