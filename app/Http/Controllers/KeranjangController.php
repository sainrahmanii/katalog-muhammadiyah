<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KeranjangController extends Controller
{
    public function keranjang()
    {
        $product = Checkout::where('user_id', Auth::id())->where('status', 0)->get();

        $jumlah_barang = $product->count();
        $quantity = Checkout::where('user_id', Auth::id())->sum('quantity');
        $subtotal = Checkout::where('user_id', Auth::id())->sum('subtotal');

        return view('customer.keranjang', compact([
            'product',
            'quantity',
            'subtotal',
            'jumlah_barang'
        ]));
    }

    public function destroy($id)
    {
        $checkout = Checkout::find($id);
        $checkout->delete();

        return redirect(route('keranjang'));
    }
}
