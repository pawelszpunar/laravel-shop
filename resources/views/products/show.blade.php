@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('shop_lang.product.show_title') }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.product.fields.name') }}</label>

                        <div class="col-md-6">
                            <input id="name" maxlength="500" type="text" class="form-control" name="name" value="{{ $product->name }}" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.product.fields.description') }}</label>

                        <div class="col-md-6">
                            <textarea id="description" maxlength="1500" class="form-control" name="description" disabled>{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.product.fields.amount') }}</label>

                        <div class="col-md-6">
                            <input id="amount" type="number" min="0" class="form-control" name="amount" value="{{ $product->amount }}" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('shop_lang.product.fields.price') }}</label>

                        <div class="col-md-6">
                            <input id="price" step="0.01" min="0" type="number" class="form-control" name="price" value="{{ $product->price }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
