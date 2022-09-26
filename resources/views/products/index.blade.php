@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>{{ __('shop_lang.product.index_title') }}</h2>
        </div>
        <div class="col-6">
            <a class="float-end" href="{{ route('products.create') }}">
                <button type="button" class="btn btn-primary">{{ __('shop_lang.button.add') }}</button>
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('shop_lang.product.fields.name') }}</th>
                    <th scope="col">{{ __('shop_lang.product.fields.description') }}</th>
                    <th scope="col">{{ __('shop_lang.product.fields.amount') }}</th>
                    <th scope="col">{{ __('shop_lang.product.fields.price') }}</th>
                    <th scope="col">{{ __('shop_lang.product.fields.category') }}</th>
                    <th scope="col">{{ __('shop_lang.columns.action') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->price }}</td>
                <td>@if($product->hasCategory()){{ $product->category->name }}@endif</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        <button class="btn btn-primary btn-sm">P</button>
                    </a>
                <a href="{{ route('products.edit', $product->id) }}">
                    <button class="btn btn-success btn-sm">E</button>
                </a>
                <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">X</button>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>

@endsection

@section('javascript')
    const deleteUrl = "{{ url('products') }}/";
    const confirm_delete_title = "{{ __('shop_lang.messages.confirm_delete_title') }}";
    const confirm_delete_text = "{{ __('shop_lang.messages.confirm_delete_text') }}";
    const confirm_button_text = "{{ __('shop_lang.messages.confirm_button_text') }}";
    const cancel_button_text = "{{ __('shop_lang.messages.cancel_button_text') }}";
    const fail_text = "{{ __('shop_lang.messages.fail_text') }}";
    const cancel_title = "{{ __('shop_lang.messages.cancel_title') }}";
    const cancel_text = "{{ __('shop_lang.messages.cancel_text') }}";
@endsection
@section('javascript-files')
    @vite(['resources/js/delete.js'])
@endsection
