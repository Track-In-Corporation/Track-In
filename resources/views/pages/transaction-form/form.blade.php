<div class="flex justify-between items-center p-6">
    <div>
        <h5 class="font-medium text-base">Pilih Produk</h5>
        <p class="text-secondary font-regular text-sm mt-0.5">Pilih produk yang ingin dimasukkan ke dalam transaksi</p>
    </div>
    <div class="flex items-end gap-2 h-fit">
        <x-search-bar route="{{ route('transaction-form') }}"></x-search-bar>
    </div>
</div>
