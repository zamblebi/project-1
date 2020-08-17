@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div class="connection">
            <div class="image">
                <img src="/img/img1.jpg" alt="">
            </div>
            <div class="">
                <div class="connection-title">{{ __('Connexion') }}</div>

                <div class="connection-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-email">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Entre votre adresse email') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="exemple@exemple.com" type="email" class="email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <br>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>{{ $message }}</strong> --}}
                                        <strong style="color: red">Votre Email ou Mot de passe est incorrect!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-password">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="">
                                <input id="password"  type="password" class="password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-remember">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="button-groups">
                            <div class="buttons">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Connexion') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
