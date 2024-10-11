<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $thumbnail;

    public function create()
    {
        $data = $this->validate([
            'name' => 'required',
            'description' => 'nullable|min:10',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable',
        ]);

        Product::create($data);

        $this->dispatch('product-created');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.product-create');
    }
}
