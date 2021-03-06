@extends('layouts.guest')

@section('content')
<div id="restaurant-form">
    <div class="container">
        {{-- lato sinistro / sono stati invertite con right-side --}}
        <div class="right-side">
            <img src="{{ asset('img/food-rest.svg') }}" alt="">
        </div>
        {{-- /lato sinistro --}}

        {{-- lato destro --}}
        <div class="left-side">
            <div class="row">
                <div class="col-md-12">
                    <div class="register-box">
                        <div class="d-flex">
                            <div class="form-register">
                                <h1>{{ __('Register') }}</h1>
                                <form method="POST" action="{{ route('admin.restaurant.store') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right" maxlength="50">Nome Attività</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right" maxlength="50">Indirizzo</label>
                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right" maxlength="50" pattern="^[+]?[0-9]+$">Telefono</label>
                                        <div class="col-md-6">
                                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="website" class="col-md-4 col-form-label text-md-right" maxlength="50">Sito Web</label>
                                        <div class="col-md-6">
                                            <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" maxlength="50" value="{{ old('website') }}" required autocomplete="website">
                                            @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email_rest" class="col-md-4 col-form-label text-md-right">Email Ristorante</label>
                                        <div class="col-md-6">
                                            <input id="email_rest" type="email" class="form-control @error('email_rest') is-invalid @enderror" name="email_rest" value="{{ old('email_rest') }}" required autocomplete="email_rest">
                                            @error('email_rest')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="vat" class="col-md-4 col-form-label text-md-right">P. IVA</label>
                                        <div class="col-md-6">
                                            <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" maxlength="11" pattern="^[0-9]+$" value="{{ old('vat') }}" required autocomplete="vat">
                                            @error('vat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="col-md-6 offset-md-4">
                                        @foreach ($types as $type)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="types[]" value="{{ $type->id }}" id="{{ $type->id }}">
                                            <label class="form-check-label" for="{{ $type->id }}">{{ $type->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="custom-file">
                                        <label class="custom-file-label" for="image">Scegli l'Immagine</label>
                                        <input type="file" class="custom-file-input form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                                        </div>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-dark">
                                                Registra
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
