<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;

class Cart extends Component
{
    public function increment($id)
    {
        $quantities = session()->get('quantities', []);

        $quantities[$id] = isset($quantities[$id]) ? $quantities[$id] + 1 : 1;

        session()->put('quantities', $quantities);

        $this->dispatch('product-updated');
    }

    public function decrement($id)
    {
        $quantities = session()->get('quantities', []);

        if (isset($quantities[$id]) && $quantities[$id] > 0) {
            $quantities[$id]--;

            if ($quantities[$id] == 0) {
                unset($quantities[$id]);
            }
        }

        session()->put('quantities', $quantities);

        $this->dispatch('product-updated');
    }

    public function getTotalQuantityProperty()
    {
        $quantities = session()->get('quantities', []);
        return array_sum($quantities);
    }

    public function getTotalPriceProperty()
    {
        $quantities = session()->get('quantities', []);
        $products = Product::whereIn('id', array_keys($quantities))->get();

        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * ($quantities[$product->id] ?? 0);
        }

        return $total;
    }

    #[On('product-updated')]
    public function render()
    {
        $quantities = session()->get('quantities', []);
        $products = Product::whereIn('id', array_keys($quantities))->get();

        return view('livewire.cart', [
            'products' => $products,
            'quantities' => $quantities,
            'totalQuantity' => $this->totalQuantity,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}
