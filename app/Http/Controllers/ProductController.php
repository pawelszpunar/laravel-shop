<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view("products.index", [
            'products' => Product::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("products.create", [
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpsertProductRequest  $request
     * @return RedirectResponse
     */
    public function store(UpsertProductRequest $request): RedirectResponse
    {
        $product = new Product($request->validated());
        if ($request->hasFile('image')) {
            $product->image_path = Storage::disk('public')->putFile('products', $request->file('image'));
        }
        $product->save();
        return redirect(route("products.index"))->with('status', __('shop_lang.product.status.save.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view("products.show", [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product  $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpsertProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpsertProductRequest $request, Product $product): RedirectResponse
    {
        $oldImagePath = $product->image_path;
        $product->fill($request->validated());
        if($request->hasFile('image')) {
            if(Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
            $product->image_path = Storage::disk('public')->putFile('products', $request->file('image'));
        }
        $product->save();
        return redirect(route("products.index"))->with('status', __('shop_lang.product.status.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            $product->delete();
            Session::flash('status', __('shop_lang.product.status.delete.success'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'error occurred'
            ])->setStatusCode(500);
        }
    }

    /**
     * Download image
     *
     * @param Product $product
     * @return RedirectResponse|Response
     */
    public function downloadImage(Product $product): RedirectResponse|Response
    {
        if (Storage::disk('public')->exists($product->image_path)) {
            $file = Storage::disk('public')->get($product->image_path);
            return (new Response($file, 200))->header('Content-Type', 'image/jpeg');
        }
        return Redirect::back();
    }
}
