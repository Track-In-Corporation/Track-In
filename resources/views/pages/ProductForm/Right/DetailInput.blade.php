<div class="flex flex-col gap-4">
    <x-genericDropdown
        name="brand"
        label="Merk Produk (Brand)"
        :items="$brands"
        :value="old('brand')"
    />
    <x-input
        label="Kode HS"
        placeholder="73072110"
        class="mt-1"
        name="code"
        :error="$errors->first('code')"
    />
    <x-input
        label="Origin (Negara)"
        placeholder="Germany"
        class="mt-1"
        name="origin"
        :error="$errors->first('origin')"
    />
    <x-input
        label="SCH"
        placeholder="40S"
        class="mt-1"
        name="sch"
        :error="$errors->first('sch')"
    />
</div>
