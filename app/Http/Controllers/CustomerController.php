<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::with('shop')->get();
        return view('customer.index', ['products' => $products]);
    }

    public function show($id)
    {
        $jumlah = 3;
        $decrement = $jumlah--;
        $product = Product::find($id);
        return view('customer.detail', compact(['product', 'jumlah', 'decrement']));
    }
}
