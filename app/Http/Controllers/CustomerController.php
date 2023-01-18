<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }else {
            $products = Product::all();
        }

        return view('customer.index', [
            'products'  => $products
        ]);
    }

    public function index()
    {
        $products = Product::with('shop')->get();
        return view('customer.index', ['products' => $products]);
    }

    public function show($slug)
    {
        $product = Product::where("slug",$slug)->get();
        return view('customer.detail', [
            'product' => $product
        ]);
    }
}
