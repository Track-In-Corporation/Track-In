<div class="text-sm">
    <p class="font-medium text-lg mb-5">Identitas Produk</p>
    <p class="text-primary">Pilih Jenis Produk</p>
    <p class="text-secondary mt-0.5">
        Beberapa produk memiliki detail pengisian data yang berbeda
    </p>
    @include('components.type-selector', [
        'selected' => $product?->type,
        'error' => $errors->first('type'),
    ])

    <div class="pt-4">
        <x-input
            label="Deskripsi Produk"
            placeholder="Flange 8'' #150 Blind.."
            class="mt-1"
            name="description"
            :value="old('description', $product->description ?? '')"
            :error="$errors->first('description')"
        />
    </div>
    <hr class="mt-10" />
</div>
