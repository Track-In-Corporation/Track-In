<div class="">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div data-product-detail="code" class="text-2xl">{{ $product->code }}</div>
            <div class="shadow-soft border px-4 flex items-center gap-2 rounded-md py-0.5">
                <div class="bg-green w-2 h-2 rounded-full"></div>
                <p class="text-sm">{{ $product->type }}</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href={{ route('product-form', ['code' => $product->code]) }}
                class="hover:border-secondary hover:*:text-primary animate-cta p-2 w-fit border shadow-soft rounded-md flex items-center justify-center aspect-square animate-cta">
                <iconify-icon icon="tabler:edit" class="text-xl text-secondary animate-cta"></iconify-icon>
            </a>
            <div data-delete-button data-action={{ route('delete-product', $product->code) }}
                class="hover:border-secondary hover:*:text-red animate-cta p-2 w-fit border shadow-soft rounded-md flex items-center justify-center aspect-square animate-cta">
                <iconify-icon icon="material-symbols:delete-outline"
                    class="animate-cta text-xl text-secondary"></iconify-icon>
            </div>
        </div>
    </div>
    @include('pages.inventory.details.commercial')
    @include('pages.inventory.details.description')
</div>
