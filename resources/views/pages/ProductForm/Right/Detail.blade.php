<div class="bg-white rounded-xl shadow-sm p-6 sticky w-full flex flex-col">
    <div class="border-t-8 border-secondary -mx-6 -mt-6 mb-6 rounded-t-2xl"></div>

    <div>
        <h2 class="text-primary text-lg font-medium mb-2">Komersial Produk</h2>
        <p class="text-sm text-secondary mb-6">
        Masukan informasi komersil yang dimiliki oleh produk
        </p>
        @include('pages.ProductForm.Right.CommercialInput')
    </div>

    <div class="mt-10 mb-16">
        <h2 class="text-primary text-lg font-medium mb-2">Detil Produk</h2>
        <p class="text-sm text-secondary mb-6">
        Masukan informasi umum yang dimiliki oleh produk
        </p>
        @include('pages.ProductForm.Right.DetailInput')
    </div>

    <a href=# class="flex items-center justify-center text-center gap-2 bg-accent text-white px-5 py-4 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
        <iconify-icon class="text-xl" icon="ic:round-plus"></iconify-icon>
        <p class="text-sm">Tambahkan Barang</p>
    </a>
</div>
