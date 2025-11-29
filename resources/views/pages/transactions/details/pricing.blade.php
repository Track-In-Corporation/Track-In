<div class="border shadow-soft rounded-lg overflow-hidden mb-6 min-h-45 mt-8">
    <div class="bg-accent w-full h-2.5 col-span-2"></div>
    <div class="grid grid-cols-[1.5fr_1fr] gap-8 px-6 py-4">
        <div class="mt-2">
            <div class="flex text-primary gap-3 items-center">
                <iconify-icon icon="humbleicons:money" class="text-2xl"></iconify-icon>
                <h3 class="text-base">Rincian Harga</h3>
            </div>
            <p class="text-sm text-secondary mt-1.5 leading-relaxed ">Perhitungan dari rincian barang yang dipilih untuk
                transaksi</p>
        </div>
        <div>
            <div class="grid grid-cols-[10rem_1fr] py-3 border-b">
                <p class="text-secondary text-sm">Subtotal</p>
                <p class="text-end text-sm whitespace-nowrap">@formatToRupiah($transaction->subtotal)</p>
            </div>
            <div class="grid grid-cols-[10rem_1fr] py-3 border-b">
                <p class="text-secondary text-sm">PPN <span
                        class="bg-accent text-white px-2 text-xs h-fit ml-2 rounded-full">11%</span></p>
                <p class="text-end text-sm whitespace-nowrap">@formatToRupiah($transaction->tax)</p>
            </div>
            <div class="grid grid-cols-[10rem_1fr] py-3 items-center">
                <p class="text-primary text-base">Total</p>
                <p class="text-end  text-primary font-medium whitespace-nowrap text-lg">@formatToRupiah($transaction->total)</p>
            </div>
        </div>
    </div>
</div>
