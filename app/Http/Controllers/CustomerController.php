<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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
        $products = Product::latest()->get();
        return view('customer.index', ['products' => $products]);
    }

    public function show($slug)
    {
        $product = Product::where("slug",$slug)->get();
        return view('customer.detail', [
            'product' => $product
        ]);
    }

    public function checkout()
    {
        $data = Checkout::where('user_id', Auth::id())->where('status', 0)->get();

        $jumlah_barang = $data->count();
        $quantity = Checkout::where('user_id', Auth::id())->sum('quantity');
        $subtotal = Checkout::where('user_id', Auth::id())->sum('subtotal');

        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('customer.invoice', [
            'data'  => $data,
            'jumlah_barang' => $jumlah_barang,
            'quantity'  => $quantity,
            'subtotal'  => $subtotal
        ]);

        return $pdf->download('invoice.pdf');

        return redirect('/katalog');
    }
}
