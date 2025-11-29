<div class="border rounded-lg mt-4">
    <p class="bg-input-background border-b px-4 py-2 rounded-t-lg">Komersial</p>
    <div class="grid grid-cols-[1fr_auto_1fr_auto_1fr] bg-white py-4">
        <div class="w-full flex items-center justify-center">
            <div class="grid grid-cols-[auto_1fr] py-1.5 items-center px-4 gap-x-3">
                <iconify-icon icon="icomoon-free:price-tag" class="text-secondary text-lg"></iconify-icon>
                <div class="text-sm text-secondary mb-0.5">Harga Barang</div>
                <div></div>
                <div>@formatToRupiah($product->price)</div>
            </div>
        </div>
        <div class="bg-border h-full w-px"></div>
        <div class="w-full flex items-center justify-center">
            <div class="grid grid-cols-[auto_1fr] py-1.5 items-center px-4 gap-x-3">
                <iconify-icon icon="solar:box-bold" class="text-secondary text-xl"></iconify-icon>
                <div class="text-sm text-secondary mb-0.5">Satuan</div>
                <div></div>
                <div>PCS</div>
            </div>
        </div>
        <div class="bg-border h-full w-px"></div>
        <div class="w-full flex items-center justify-center">
            <div class="grid grid-cols-[auto_1fr] py-1.5 items-center px-4 gap-x-3">
                <iconify-icon icon="charm:container" class="text-secondary text-xl"></iconify-icon>
                <div class="text-sm text-secondary mb-0.5">Stock Barang</div>
                <div></div>
                <div>@formatNumber($product->quantity)</div>
            </div>
        </div>
    </div>
</div>
