<div class="text-sm">
    <p class="font-medium text-lg mb-5">Spesifikasi Teknis</p>
    <p class="text-secondary mt-0.5">
    Masukan informasi teknis tentang produk seperti jenis material, type, satuan, kategori ukuran, dan  lain - lain.
    </p>
    @include('components.TypeSelector')

    <div class="pt-4">
        <div class="flex flex-col gap-2">
            <div class="flex gap-2">
                <x-input
                    label="Ukuran"
                    placeholder="8"
                    class="mt-2"
                    name="size"
                    :error="$errors->first('size')"
                />
            </div>
            <div class="flex gap-2">
                <x-input
                    label="Satuan"
                    placeholder="EA"
                    class="mt-2"
                    name="sch"
                    :error="$errors->first('sch')"
                />
            </div>
        </div>
    </div>
    <hr class="mt-10" />
</div>
