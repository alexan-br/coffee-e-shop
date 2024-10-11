<div
    x-data
    x-on:product-created="$refs.modal.hidePopover()"
>
    <a
        class="p-4 bg-slate-950 text-slate-100 font-semibold rounded-lg"
        href="#"
        x-on:click.prevent="$refs.modal.showPopover()"
    >
        New product
    </a>

    <div
        popover
        x-ref="modal"
        class="p-4 shadow-xl z-10 mx-auto rounded-md backdrop:bg-slate-900/20 w-96"
    >
        <div class="font font-bold text-xl mb-5">Add a new product</div>
        <form wire:submit="create" class="flex flex-col gap-4">
            @csrf
            <label for="name" class="flex flex-col font-semibold">
                Product name
                <input
                    class="rounded-md font-normal"
                    type="text"
                    wire:model="name"
                >
                @error('name')
                    {{ $message }}
                @enderror
            </label>
            <label for="description" class="flex flex-col font-semibold">
                Product description
                <textarea
                    class="rounded-md font-normal"
                    id=""
                    wire:model="description"
                >
                </textarea>
                @error('description')
                    {{ $message }}
                @enderror
            </label>
            <label for="price" class="flex flex-col font-semibold">
                Product price
                <input
                    type="number"
                    step="0.01"
                    class="rounded-md font-normal"
                    id=""
                    wire:model="price"
                />
                @error('price')
                    {{ $message }}
                @enderror
            </label>
            <label for="thumbnail" class="flex flex-col font-semibold">
                Product thumbnail
                <input
                    type="text"
                    class="rounded-md font-normal"
                    id=""
                    wire:model="thumbnail"
                >
                @error('thumbnail')
                    {{ $message }}
                @enderror
            </label>
            <div class="flex justify-between">
                <button
                    type="submit"
                    class="p-4 bg-slate-950 text-slate-50 rounded-md font-semibold"
                >
                    Add product
                </button>
                <button
                    x-on:click.prevent="$refs.modal.hidePopover()"
                >
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
