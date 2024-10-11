<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;

    public function mount($productId)
    {
        $this->product = Product::findOrFail($productId);
    }

    public function increment($productId)
    {
        $quantities = session()->get('quantities', []);

        $quantities[$productId] = isset($quantities[$productId]) ? $quantities[$productId] + 1 : 1;

        session()->put('quantities', $quantities);

        // $this->dispatch('product-updated');
    }

    public function decrement($productId)
    {
        $quantities = session()->get('quantities', []);

        if (isset($quantities[$productId]) && $quantities[$productId] > 0) {
            $quantities[$productId]--;

            if ($quantities[$productId] == 0) {
                unset($quantities[$productId]);
            }
        }

        session()->put('quantities', $quantities);

        // $this->dispatch('product-updated');
    }

    public function addToCart()
    {
        // $quantities = session()->get('quantities', []);

        // session()->put('quantities', $quantities);

        $this->dispatch('product-updated');
    }

    #[On('product-updated')]
    public function render()
    {
        $quantity = session('quantities.' . $this->product->id, 0);

        return view('livewire.product-detail', ['quantity' => $quantity]);
    }
}
