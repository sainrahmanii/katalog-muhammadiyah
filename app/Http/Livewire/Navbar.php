<?php

namespace App\Http\Livewire;

use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $keranjang = 0;

    public function mount()
    {
        $keranjang = Checkout::where('user_id', Auth::id())
            ->where('status', 0)
            ->get();

        if (Auth::check()) {
            if ($keranjang !== 1) {
                $this->keranjang = $keranjang->count();
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'keranjang' => $this->keranjang,
        ]);
    }
}
