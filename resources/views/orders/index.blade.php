@extends('layouts.app')
@section('content')

<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-6">
            <h2><i class="fa-solid fa-rectangle-list"></i> Orders </h2>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price [PLN]</th>
                    <th scope="col">Order status</th>
                    <th scope="col">Products</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <th scope="row">{{ $order->quantity }}</th>
                    <th scope="row">{{ $order->price }}</th>
                    <th scope="row">{{ $order->payment->status }}</th>
                    <th scope="row">
                        <ul>
                            @foreach($order->products as $product)
                                <li>{{ $product->name }} - {{ $product->description }}</li>
                            @endforeach
                        </ul>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
@endsection
