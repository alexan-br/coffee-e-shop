<div class="product-detail">
    <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <span>${{ number_format($product->price, 2) }}</span>

    <div class="quantity-selector">
        <button
            wire:click="decrement({{$product->id}})"
            class="quantity-button decrement"
        >
            -
        </button>
        <span>{{ $quantity }}</span>
        <button
            wire:click="increment({{$product->id}})"
            class="quantity-button increment"
        >
            +
        </button>
    </div>

    <button
        wire:click="addToCart"
        class="bg-orange-950 text-white px-4 py-2 view-button mt-2 block text-center rounded-md add-to-cart-button"
    >
        Add to Cart
    </button>
</div>
