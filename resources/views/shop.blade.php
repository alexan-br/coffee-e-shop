
<!DOCTYPE html>
<html lang="en" class="scroll-smooth focus:scroll-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col h-screen bg-white">
    <div class="border-b border-slate-200 px-5">
        <div class="container mx-auto">
            <div class="flex justify-between py-4 items-center">
                <a href="/" class="font-semibold text-lg" wire:navigate.hover>Coffe-e-shop</a>
                <a href="/dashboard/products" wire:navigate.hover>Dashboard</a>
                <livewire:cart />
            </div>
        </div>
    </div>
    <div class="pb-4 overflow-y-scroll grow bg-slate-100">
        <div class="">
            <div class="products-section">
                @if (Route::is('shop'))
                    <!-- Product List -->
                    @livewire('products-list', ['context' => 'shop'])
                @elseif(Route::is('product.show'))
                    <!-- Product Detail -->
                    @livewire('product-detail', ['productId' => request('productId')])
                @endif
            </div>
        </div>
    </div>
    {{-- <iframe
        class="absolute transition-all bottom-5 left-5 w-80 hover:w-3/4 opacity-50"
        style="border-radius:12px"
        src="https://open.spotify.com/embed/playlist/1MYMvIg3oqulwr99qbjL8W?utm_source=generator"
        width="75%"
        height="152"
        frameBorder="0"
        allowfullscreen=""
        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
        loading="lazy">
    </iframe> --}}
</body>
</html>
