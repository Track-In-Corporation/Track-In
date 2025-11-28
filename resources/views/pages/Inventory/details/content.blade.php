<div class="">
    <div class="flex items-center gap-4">
        <div data-product-detail="code" class="text-2xl">{{ $product->code }}</div>
        <div class="shadow-soft border px-4 flex items-center gap-2 rounded-md py-0.5">
            <div class="bg-green w-2 h-2 rounded-full"></div>
            <p class="text-sm">{{ $product->type }}</p>
        </div>
    </div>
    @include("pages.inventory.details.commercial")
    @include("pages.inventory.details.description")
</div>
