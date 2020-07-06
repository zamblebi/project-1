@extends('layouts.app')

@section('content')
<div class="container">
    <div class="inscription">
        
                <div class="inscription-title">{{ __('Incription') }}</div>

                <div class="inscription-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-name-inscription">
                            <label for="name">{{ __('Nom') }}</label>

                            <div class="">
                                <input id="name" placeholder="Kouadio" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-email-inscription">
                            <label for="email">{{ __('Adresse E-Mail') }}</label>

                            <div class="">
                                <input id="email" type="email" placeholder="exemple@exemple.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-password-inscription">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="">
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-password-confirm-inscription">
                            <label for="password-confirm">{{ __('Confirmer le mot de passe') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-button">
                            <div class="button-submit">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


    </div>
</div>
@endsection
