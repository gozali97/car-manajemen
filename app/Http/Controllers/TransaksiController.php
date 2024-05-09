<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add($slug)
    {
        $product = Car::query()
            ->with(['category', 'brand'])
            ->where('slug', $slug)
            ->first();

        return Inertia::render('Checkout', [
            'product' => $product
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $total = $request->price;

        $car = Car::where('id', $request->car_id)->first();

        $order_id = 'order-'.now()->format('Y').$request->user()->id.now()->format('Hm-s').rand(1, 10);

        $order = new Transaksi;
        $order->no_order = $order_id;
        $order->user_id = $user->id;
        $order->car_id = $request->car_id;
        $order->address = $request->address;
        $order->phone_number = $request->phone_number;
        $order->start_date = $request->start_date;
        $order->end_date = $request->end_date;
        $order->status = 'Unpaid';
        $order->gross_amount = $total;
        if($order->save()){

            return redirect()->route('dashboard')->with('success', 'Checkout succesfully');
        }else{
            return redirect()->route('transaksi.add', $car->slug)->with('error', 'Checkout failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
