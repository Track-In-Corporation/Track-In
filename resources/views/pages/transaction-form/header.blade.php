<div class="flex items-center border-b py-5 px-8 justify-between">
    <div class="flex gap-4 items-center">
        <a href="{{ route('transactions') }}"
            class="rounded-full bg-background w-10 h-10 flex items-center justify-center">
            <iconify-icon icon="tabler:chevron-left" width="20"></iconify-icon>
        </a>
        <div>
            <h2 class="font-semibold text-2xl">Tambahkan Transaksi
            </h2>
            <p class="text-secondary font-normal tracking-normal text-sm mt-0.5">
                Masukan data untuk menambahkan transaksi baru
            </p>
        </div>
    </div>
    <button name="mode" value="submit" type="submit"
        class="flex items-center justify-center text-center gap-2 bg-accent text-white px-5 py-3 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)] cursor-pointer">
        <iconify-icon class="text-xl" icon="material-symbols:check-rounded"></iconify-icon>
        <p class="text-sm">Selesaikan</p>
    </button>
</div>
