<x-layout>
    <div class="flex flex-col gap-5 mt-5">
        <div>
            <livewire:product-create />
        </div>
        @livewire('products-list', ['context' => 'dashboard'])
    </div>
</x-layout>
