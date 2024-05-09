<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Car::query()
            ->with(['category', 'brand']);
        $filterProducts = $products->filtered()
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();
        $brands = Brand::all();

        return Inertia::render('Product',[
            'products' => $filterProducts,
            'categories' => $categories,
            'brands' => $brands,
            'search' => $request->search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Car::query()
            ->with(['category', 'brand'])
            ->where('slug', $slug)
            ->first();
//        dd($product);

        return Inertia::render('Show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
