<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $filters = $request->query('filter');
        $paginate = $request->query('paginate') ?? 5;
        $sort = $request->query('sort') ?? 1;

        $query = Product::query();
                if(!is_null($filters)) {
            if (array_key_exists('categories', $filters))
            $query = $query->whereIn('category_id', $filters['categories']);
            if (!is_null($filters['price_min'])) {
                $query = $query->where('price', '>=', $filters['price_min']);
            }
            if (!is_null($filters['price_max'])) {
                $query = $query->where('price', '<=', $filters['price_max']);
            }

            switch ($sort) {
                case 1:
                    $query = $query->orderBy('name', 'ASC');
                    break;
                case 2:
                    $query = $query->orderBy('name', 'DESC');
                    break;
                case 3:
                    $query = $query->orderBy('created_at', 'ASC');
                    break;
                case 4:
                    $query = $query->orderBy('created_at', 'DESC');
                    break;
                default:
                    $query = $query->orderBy('created_at', 'ASC');
            }

            return response()->json($query->paginate($paginate));
        }

        return view("welcome", [
            'products' => $query->paginate($paginate),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
            'default_image' => config('laravel-shop.defaultImage'),
            'isGuest' => Auth::guest()
        ]);
    }
}
