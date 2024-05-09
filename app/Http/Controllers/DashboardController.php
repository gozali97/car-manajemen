<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){

        $orders = Transaksi::query()
            ->with(['car', 'user'])
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->paginate(10);
//        dd($order);
        return Inertia::render('Dashboard', [
            'orders' => $orders
        ]);
    }
}
