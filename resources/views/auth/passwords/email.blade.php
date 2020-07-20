@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div class="">
            <div class="">
                <div class="password-title">{{ __('Mot de passe oublier') }}</div>

                <div class="form-password">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-email-password">
                            <label for="email" >{{ __('Votre adresse email') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-button">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer le lien de recupperations') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
