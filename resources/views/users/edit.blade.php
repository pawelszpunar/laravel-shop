@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('shop_lang.user.edit_title', ['email' => $user->email]) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.user.fields.city') }}</label>
                            <div class="col-md-6">
                                <input id="city" maxlength="500" type="text" class="form-control @error('city') is-invalid @enderror" name="address[city]" value="{{ $user?->address?->city }}" required autocomplete="city" autofocus>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.user.fields.zip_code') }}</label>
                            <div class="col-md-6">
                                <input id="zip_code" maxlength="500" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="address[zip_code]" value="{{ $user?->address?->zip_code }}" required autocomplete="zip_code" autofocus>
                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.user.fields.street') }}</label>
                            <div class="col-md-6">
                                <input id="street" maxlength="500" type="text" class="form-control @error('street') is-invalid @enderror" name="address[street]" value="{{ $user?->address?->street }}" required autocomplete="street" autofocus>
                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street_no" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.user.fields.street_no') }}</label>
                            <div class="col-md-6">
                                <input id="street_no" maxlength="500" type="text" class="form-control @error('street_no') is-invalid @enderror" name="address[street_no]" value="{{ $user?->address?->street_no }}" required autocomplete="street_no" autofocus>
                                @error('street_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="home_no" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.user.fields.home_no') }}</label>
                            <div class="col-md-6">
                                <input id="home_no" maxlength="500" type="text" class="form-control @error('home_no') is-invalid @enderror" name="address[home_no]" value="{{ $user?->address?->home_no }}" required autocomplete="home_no" autofocus>
                                @error('home_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6t text-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('shop_lang.button.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
