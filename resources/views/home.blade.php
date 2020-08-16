@extends('layouts.app')

@section('content')
<div class="container wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            {{-- <div class="card-header"><h2>{{ __( 'Mon compte') }}</h2></div> --}}
                    <div class="small-menu-dashboard">
                       <user-profil></user-profil> 
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('Bienvenue vous etes connecter!') }} --}}
                        
                </div>
            </div>
        </div>
    </div>
</div>
 {{-- @include('includes.footer') --}}
@endsection
