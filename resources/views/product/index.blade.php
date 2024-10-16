<x-layout>
    <div class="border-b border-slate-200 text-slate-100">
        <div class="container mx-auto">
            <div class="flex justify-between py-4">
                <a href="/" wire:navigate.hover>Ma boutique</a>
                <a href="/dashboard/products" wire:navigate.hover>Dashboard</a>
                <livewire:cart />
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-5 mt-5">
        <div>
            <livewire:product-create />
        </div>
        @livewire('products-list', ['context' => 'dashboard'])
    </div>
</x-layout>
