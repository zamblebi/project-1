@extends('layouts.app')

@section('content')
<div class="container">
    <div class="inscription">

                <div class="inscription-title">{{ __('Incription') }}</div>

                <div class="inscription-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-name-inscription">
                            <label for="lastName">{{ __('Nom') }}</label>

                            <div class="">
                                <input id="lastName" placeholder="Kouadio" type="text" class="@error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-name-inscription">
                            <label for="firstName">{{ __('Prénoms') }}</label>

                            <div class="">
                                <input id="firstName" placeholder="Leandre" type="text" class="@error('FistName') is-invalid @enderror" name="firstName" value="{{ old('firstaName') }}" required autocomplete="fitstName" autofocus>

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-email-inscription">
                            <label for="email">{{ __('Adresse email') }}</label>

                            <div class="">
                                <input id="email" type="email" placeholder="exemple@exemple.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-email-inscription">
                            <label for="phone_number">{{ __('Numéro de téléphone') }}</label>

                            <div class="">
                                <input id="phone_number" type="text" placeholder="012345678" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
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

                {{-- <form action="{{ route('adresse.store') }}" method="post"></form> --}}
                            {{-- <input type="hidden" name="adresse_id" value="1"> --}}
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
