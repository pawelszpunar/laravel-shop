<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ValueObjects\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        dd(Session::get('cart', new Cart()));
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function store(Product $product): JsonResponse
    {
        $cart = Session::get('cart', new Cart());
        Session::put('cart', $cart->addItem($product));
        return response()->json([
            'status' => 'success'
        ]);
    }
}
