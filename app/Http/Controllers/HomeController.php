<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Car::query()
            ->with(['category', 'brand'])
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->OrWhere('description', 'like', '%' . $search . '%')
                    ->OrWhere('price', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();
        return Inertia::render('Home',[
            'products' => $products,
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
