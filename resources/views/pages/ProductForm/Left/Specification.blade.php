<div class="text-sm">
    <p class="font-medium text-lg">Spesifikasi Teknis</p>
    <p class="text-secondary mt-0.5">
    Masukan informasi teknis tentang produk seperti jenis material, type, satuan, kategori ukuran, dan  lain - lain.
    </p>

    <div class="pt-4">
        <div class="flex flex-col gap-4">
            @include('pages.ProductForm.Left.radiobutton')
            <p class="text-secondary italic mb-2">*Dapat memilih lebih dari satu</p>
            <div class="flex gap-4">
                <x-input
                    label="Ukuran"
                    placeholder="8"
                    class="mt-1"
                    name="size"
                    :error="$errors->first('size')"
                />
                <x-genericDropdown
                    name="unit"
                    label="Unit"
                    :items="$units"
                    :value="old('unit')"
                />
            </div>
            <div class="flex">
                <x-genericDropdown
                    name="material"
                    label="Material"
                    :items="$materialFamilies"
                    :value="old('material')"
                />
            </div>
        </div>
    </div>
</div>
