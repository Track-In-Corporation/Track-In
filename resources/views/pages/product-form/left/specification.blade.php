<div class="text-sm">
    <p class="font-medium text-lg">Spesifikasi Teknis</p>
    <p class="text-secondary mt-0.5">
        Masukan informasi teknis tentang produk seperti jenis material, type, satuan, kategori ukuran, dan lain - lain.
    </p>

    <div class="pt-4">
        <div class="flex flex-col gap-4">
            @include('pages.product-form.left.radio-button')
            <p class="text-secondary italic mb-2">*Dapat memilih lebih dari satu</p>
            <div class="flex gap-4 relative z-20">
                <x-input label="Ukuran" placeholder="8" class="mt-0.5" name="size" :value="old('size', $product->size ?? '')" :error="$errors->first('size')" />
                <x-input-dropdown triggerClass="py-3" label="Satuan" name="unit" :items="$units" :value="old('unit', $product->unit ?? '')" :error="$errors->first('unit')">
                </x-input-dropdown>
            </div>
            <div class="flex">
                <x-input-dropdown triggerClass="py-3" label="Material" name="material_family" :items="$materialFamilies"
                    :value="old('material_family')" :error="$errors->first('material_family')">
                </x-input-dropdown>
            </div>
        </div>
    </div>
</div>
