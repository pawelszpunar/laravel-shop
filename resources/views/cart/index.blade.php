@extends('layouts.app')

@section('css-files')
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="container">
        @include('helpers.flash-messages')
        <div class="cart_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_title">Shopping Cart<small> ({{ $cart->getItems()->count() }}) </small></div>
                            <form action="{{ route('orders.store') }}" method="POST" id="order-form">
                            @csrf
                                <div class="cart_items">
                                    <ul class="cart_list">
                                    @foreach($cart->getItems() as $item)
                                            <li class="row text-center justify-content-center cart_item clearfix align-items-center">
                                                <div class="col-md-2">
                                                    <img src="{{ $item->getImage() }}" class="img-fluid mx-auto d-block" alt="product image">
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="cart_item_title">Name</div>
                                                    <div class="cart_item_text">{{ $item->getName() }}</div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="cart_item_title">Quantity</div>
                                                    <div class="cart_item_text">{{ $item->getQuantity() }}</div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="cart_item_title">Price [PLN]</div>
                                                    <div class="cart_item_text">{{ $item->getPrice() }}</div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="cart_item_title">Total [PLN]</div>
                                                    <div class="cart_item_text">{{ $item->getSum() }}</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-sm delete" data-id="{{ $item->getProductId() }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title">Order Total:</div>
                                        <div class="order_total_amount">{{ $cart->getSum() }}</div>
                                    </div>
                                </div>
                                <div class="cart_buttons">
                                    <a href="/" class="button cart_button_clear">Back to the shop</a>
                                    <button type="submit" class="button cart_button_checkout">Pay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    const deleteUrl = "{{ url('cart') }}/";
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
