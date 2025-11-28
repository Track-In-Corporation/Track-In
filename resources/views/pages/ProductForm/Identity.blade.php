<div class="text-sm">
    <p class="font-medium text-lg mb-5">Identitas Produk</p>
    <p class="text-primary">Pilih Jenis Produk</p>
    <p class="text-secondary mt-0.5">
    Beberapa produk memiliki detail pengisian data yang berbeda
    </p>
    @include('components.TypeSelector')

    <div class="pt-4">
        <x-input
            label="Deskripsi Produk"
            placeholder="Flange 8'' #150 Blind.."
            class="mt-2"

            name="description"
            :error="$errors->first('description')"
        />
    </div>
    <hr class="mt-10" />
</div>
