<?php

namespace App\Http\Livewire;

use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Counter extends Component
{
    public $quantity = 1, $harga, $name, $slug, $product;

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function mount($product)
    {
        $this->harga = $product->harga;
        $this->name = $product->name;
        $this->slug = $product->slug;
    }

    public function render()
    {
        return view('livewire.counter');
    }

    public function keranjang()
    {
        $keranjang = Checkout::where('user_id', Auth::id())->where('status', 0)->where('product_id', $this->product->id)->first();
        $subtotal = $this->harga*$this->quantity;

        if (empty($keranjang)) {
            Checkout::create([
                'user_id'       => Auth::id(),
                'product_id'    => $this->product->id,
                'quantity'      => $this->quantity,
                'subtotal'      => $subtotal
            ]);
        } else {
            $keranjang->quantity = $keranjang->quantity + $this->quantity;
            $keranjang->subtotal = $keranjang->subtotal + $subtotal;
            $keranjang->update();
        }

        return redirect(route('index'));
    }
}
