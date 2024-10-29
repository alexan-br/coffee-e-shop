<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public $search = '';
    public $context; // 'dashboard' or 'shop'

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete(Product $product)
    {
        $product->delete();
        $this->dispatch('product-deleted');
    }

    public function edit(Product $product)
    {
        $this->emit('editProduct', $product);
    }

    #[On('product-created', 'product-deleted')]
    public function render()
    {
        if ($this->context === 'dashboard') {
            $products = Product::query()
                ->when($this->search, fn($query) => $query->where('name', 'like', "%{$this->search}%"))
                ->latest()
                ->paginate(3);
            return view('livewire.products-list', compact('products'));
        } else if ($this->context === 'shop') {
            $products = Product::all();
            return view('livewire.shop-product-list', compact('products'));
        }
    }
}
