<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    public function index()
    {
        $products = Product::latest()->whereShopId(Auth::id())->paginate(10);
        return view('seller.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('seller.create');
    }

    public function post(Request $request)
    {
        // return $request->all();

        $validated = $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required|max:255',
            'image' => 'required|mimes:jpg,png',
            'harga' => 'required|numeric',
            'available' => 'required|max:255',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/image-products', $image->hashName());
        $shop_id = auth()->id();

        Product::create([
            'name'      => $request->name,
            'detail'    => $request->detail,
            'available' => $request->available,
            'shop_id'   => $shop_id,
            'harga'     => $request->harga,
            'image'     => $image->hashName()
        ]);

        return redirect(route('seller.index'));
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('seller.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required|max:255',
            'image' => 'required|mimes:jpg,png',
            'harga' => 'required|numeric',
            'available' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/image-products', $image->hashName());

            Storage::delete('public/image-products/'.$product->image);

            $product->update([
                'name'       => $request->name,
                'detail'     => $request->detail,
                'image'      => $image->hashName(),
                'harga'      => $request->harga,
                'available'  => $request->available
            ]);
        } else {
            $product->update([
                'name'       => $request->name,
                'detail'     => $request->detail,
                'harga'      => $request->harga,
                'available'  => $request->available
            ]);
        }


        return redirect(route('seller.index'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete('public/image-products/'.$product->image);
        $product->delete();

        return redirect(route('seller.index'));
    }
}
