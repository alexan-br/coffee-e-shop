
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col h-screen bg-white">
    <div class="border-b border-slate-200">
        <div class="container mx-auto">
            <div class="flex justify-between py-4">
                <a href="/" wire:navigate.hover>Ma boutique</a>
                <livewire:cart />
            </div>
        </div>
    </div>
    <div class="py-4 overflow-y-scroll grow bg-slate-100">
        <div class="container mx-auto">
            {{-- @livewire('products-list', ['context' => 'shop']) --}}
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
</body>
</html>
