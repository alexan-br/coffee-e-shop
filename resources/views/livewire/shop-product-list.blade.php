<div>
    <div class="bg-green-900 text-slate-100 h-60 flex justify-center items-center">
        <h1 class="text-4xl font-sans font-semibold text-center tracking-wide px-5 container mx-auto">Your way to enjoy coffee is unique, so are our products</h1>
    </div>
    <section class="bg-white py-10 px-5 mb-10">
        <div class="container mx-auto flex flex-col lg:flex-row items-center text-center lg:text-left">
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-semibold mb-5">About Our Shop</h2>
                <p class="text-lg mb-5">
                    At our coffee shop, we believe that every coffee lover deserves the best. That's why we offer a wide range of high-quality coffee products, from beans to brewing equipment. Our products are carefully selected to ensure that you get the best flavor and experience with every cup.
                </p>
                <p class="text-lg">
                    Whether you're a seasoned barista or just starting your coffee journey, we have something for everyone. Explore our collection and find the perfect items to enhance your coffee experience.
                </p>
                <a href="#product-list" class="bg-orange-950 mt-5 inline-flex items-center text-white px-4 py-2 view-button text-center rounded-md text-lg font-semibold transition-colors hover:bg-orange-900">
                    Shop Now <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </a>
            </div>
            <div class="lg:w-1/2 mt-5 lg:mt-0">
                <img src="https://www.royalcupcoffee.com/sites/default/files/images/blog/AdobeStock_159183621update.jpg" alt="Coffee Image" class="w-full h-auto rounded-lg shadow-md">
            </div>
        </div>
    </section>
    <section id="product-list" class="px-5">
        <h2 class="text-3xl font-semibold container mx-auto mb-8">Find your perfect item</h2>
        {{-- <iframe src="https://alexan-br.github.io/e-shop-laravel" width="100%" height="400" frameborder="0"></iframe> --}}
        <div class="product-list grid grid-cols-1 gap-5 container mx-auto sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach ($products as $product)
                <div class="product-card relative bg-slate-50 p-5 rounded-lg shadow-md transition-all hover:-translate-y-2">
                    <a
                        href="{{ route('product.show', $product->id) }}"
                        class="absolute top-0 left-0 w-full h-full"
                        wire:navigate.hover
                    >
                    </a>
                    <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
                    <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                    <span>${{ number_format($product->price, 2) }}</span>
                    <span
                        class="bg-orange-950 text-white px-4 py-2 view-button mt-2 block text-center rounded-md transition-colors hover:bg-orange-900"
                    >
                        Purchase
                    </span>
                </div>
            @endforeach
        </div>
    </section>
</div>

