@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="change_password">
                <h1 class="card-header">Changer de mot de passe</h1>
   
                <div >
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe actuel</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
                            <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
                                <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Confirmer votre nouveau mot de passe</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                            <div class="submit-button">
                                <button type="submit" class="btn btn-primary">
                                   Modifier le mot de passe 
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection