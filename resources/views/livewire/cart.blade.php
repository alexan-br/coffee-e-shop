<div x-data="{ open: false}" class="relative">
    <button x-on:click="open = ! open">Cart ({{ array_sum($quantities) }})</button>
    <div x-show="open" x-on:click.outside="open = false" class="absolute bottom-0 right-0 p-4 translate-y-full bg-white shadow w-96">
        <ul>
            @forelse($products as $product)
                <li class="flex items-center justify-between py-1">
                    <div class="flex flex-row items-center gap-2">
                        <img class="max-w-10 h-auto" src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
                        <div>{{ $product->name }}</div>
                    </div>
                    <div class="flex items-center gap-1 flex-nowrap">
                        <button
                            type="button"
                            class="flex items-center justify-center w-8 h-8 rounded-full font-semibold bg-green-800 text-slate-50"
                            wire:click="decrement({{$product->id}})"
                        >-</button>
                        <div class="w-8 text-center">{{ $quantities[$product->id] ?? 0 }}</div>
                        <button
                            type="button"
                            class="flex items-center justify-center w-8 h-8 rounded-full font-semibold bg-green-800 text-slate-50"
                            wire:click="increment({{$product->id}})"
                        >+</button>
                    </div>
                </li>
            @empty
                <li class="py-8 text-center">Your cart is empty</li>
            @endforelse
            <li class="flex items-center justify-between py-1 border-t border-slate-200">
                <div>Total</div>
                <div class="text-nowrap">
                    {{ Number::currency($totalPrice, 'EUR', 'fr') }}
                </div>
            </li>
        </ul>
    </div>
</div>
