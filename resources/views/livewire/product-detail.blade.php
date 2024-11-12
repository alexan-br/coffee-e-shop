<div class="product-detail flex flex-col md:flex-row mt-10">
    <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
    <div class="flex flex-col gap-5">
        <h1 class="font-semibold text-4xl">{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <span class="font-semibold text-xl">${{ number_format($product->price, 2) }}</span>

        <div class="quantity-selector flex flex-row gap-3 items-center">
            <button
                wire:click="decrement({{$product->id}})"
                class="quantity-button decrement w-9 h-9 bg-green-800 font-semibold text-slate-50 rounded-full"
            >
                -
            </button>
            <span class="font-semibold text-lg w-8 text-center">{{ $quantity }}</span>
            <button
                wire:click="increment({{$product->id}})"
                class="quantity-button increment w-9 h-9 bg-green-800 font-semibold text-slate-50 rounded-full"
            >
                +
            </button>
        </div>

        <button
            wire:click="addToCart"
            class="bg-orange-950 text-white px-4 py-2 view-button mt-2 block text-center rounded-md add-to-cart-button transition-colors hover:bg-orange-900"
        >
            Add to Cart
        </button>
    </div>
</div>
