<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Counter extends Component
{
    public $quantity = 1;
    public $harga;
    public $name;

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
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
