<div class="border rounded-lg mt-4">
    <p class="bg-input-background border-b px-4 py-2  rounded-t-lg">
        {{ __('messages.inventory.detail.commercial') }}</p>
    <div class="grid grid-cols-[1fr_auto_1fr_auto_1fr] bg-white py-4 md:py-1 md:grid-cols-1">
        <div class="w-full flex items-center justify-center md:justify-start md:border-b md:mb-1 md:pb-1">
            <div class="grid grid-cols-[auto_1fr] py-1.5 items-center px-4 gap-x-3">
                <iconify-icon icon="icomoon-free:price-tag" class="text-secondary text-lg"></iconify-icon>
                <div class="text-sm text-secondary mb-0.5">{{ __('messages.inventory.detail.price') }}</div>
                <div></div>
                <div>@formatToRupiah($product->price)</div>
            </div>
        </div>
        <div class="bg-border h-full w-px"></div>
        <div class="w-full flex items-center justify-center md:justify-start md:border-b md:mb-1 md:pb-1">
            <div class="grid grid-cols-[auto_1fr] py-1.5 items-center px-4 gap-x-3">
                <iconify-icon icon="solar:box-bold" class="text-secondary text-xl"></iconify-icon>
                <div class="text-sm text-secondary mb-0.5">{{ __('messages.inventory.detail.unit') }}</div>
                <div></div>
                <div>PCS</div>
            </div>
        </div>
        <div class="bg-border h-full w-px"></div>
        <div class="w-full flex items-center justify-center md:justify-start">
            <div class="grid grid-cols-[auto_1fr] py-1.5 items-center px-4 gap-x-3">
                <iconify-icon icon="charm:container" class="text-secondary text-xl"></iconify-icon>
                <div class="text-sm text-secondary mb-0.5">{{ __('messages.inventory.detail.stock') }}</div>
                <div></div>
                <div>@formatNumber($product->quantity)</div>
            </div>
        </div>
    </div>
</div>
