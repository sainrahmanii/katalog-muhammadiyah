<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function keranjang()
    {
        $product = Checkout::where('user_id', Auth::id())->where('status', 0)->get();

        $jumlah_barang = $product->count();
        // $quantity = $product['quantity'] += $product['quantity'];
        // $subtotal = $product->subtotal->count();

        $quantity = Checkout::where('user_id', Auth::id())->sum('quantity');
        $subtotal = Checkout::where('user_id', Auth::id())->sum('subtotal');

        return view('customer.keranjang', compact([
            'product',
            'quantity',
            'subtotal',
            'jumlah_barang'
        ]));
    }
}
