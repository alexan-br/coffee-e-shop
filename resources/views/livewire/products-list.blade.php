<div class="flex flex-col gap-4">
    <input class="" type="text" name="search" placeholder="Research product..." wire:model.live.debounce.500ms="search">
    <table class="bg-slate-50 w-full rounded-lg overflow-hidden">
        <tr class="bg-slate-950 text-slate-50 font-semibold">
            <td class="p-4">ID</td>
            <td class="p-4">Name</td>
            <td class="p-4">Description</td>
            <td class="p-4">Price</td>
            <td class="p-4">Thumbnail</td>
            <td class="p-4">Creation</td>
            <td class="p-4">Creation</td>
            <td class="p-4">Options</td>
        </tr>
        @foreach ($products as $product)
            <tr class="divide-x" wire:key="product-{{$product->id}}">
                <td class="p-4 border border-slate-200">
                    {{$product->id}}
                </td>
                <td class="p-4 border border-slate-200">
                    {{$product->name}}
                </td>
                <td class="p-4 border border-slate-200">
                    {{str($product->description)->words(4)}}
                </td>
                <td class="p-4 border border-slate-200">
                    {{Number::currency($product->price, 'EUR', 'fr')}}
                </td>
                <td class="p-4 border border-slate-200">
                    <img
                        src="{{str($product->thumbnail)}}"
                        alt=""
                        class="text max-w-36"
                    >
                </td>
                <td class="p-4 border border-slate-200">
                    {{$product->created_at->diffForHumans()}}
                </td>
                <td>
                    <button wire:click="delete({{ $product->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
</div>
