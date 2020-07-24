@extends('layouts.master')

@section('content')

    @if($flash = session('update'))
            <div class="alert alert-success">
                <span>{{ $flash }}</span>
            </div>
    @endif


<form action="{{ route('update-category', $category->id)}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Type de vetement </label>
    <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleFormControlInput1" placeholder="Chemise">
    @error('name')
    <span style="color: red">
      Nom non valide
      </span>
    @enderror
</div>



  <div class="form-group">
        <button class="btn btn-primary">Modifier</button>
  </div>
</form>
    
@endsection