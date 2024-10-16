<div class="product-list grid grid-cols-4 gap-4">
    @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <span>${{ number_format($product->price, 2) }}</span>
            <a
                href="{{ route('product.show', $product->id) }}"
                class="bg-blue-500 text-white px-4 py-2 view-button"
                wire:navigate.hover
            >
                View
            </a>
        </div>
    @endforeach
    {{-- {{ $products->links() }} --}}
</div>

