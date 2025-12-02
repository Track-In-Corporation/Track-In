<div class="flex flex-col gap-4">
    <x-input-dropdown triggerClass="py-3" label="Merk Produk (Brand)" name="brand" :items="$brands" :value="old('brand', $product->brand ?? '')"
        :error="$errors->first('brand')">
    </x-input-dropdown>
    <x-input label="Kode HS" placeholder="73072110" class="mt-1" name="hs_code" :value="old('hs_code', $product->hs_code ?? '')" :error="$errors->first('hs_code')" />
    <x-input label="Origin (Negara)" placeholder="Germany" class="mt-1" name="country_origin" :value="old('country_origin', $product->country_origin ?? '')"
        :error="$errors->first('country_origin')" />
    <x-input label="SCH" placeholder="40S" class="mt-1" name="sch" :value="old('sch', $product->sch ?? '')" :error="$errors->first('sch')" />
</div>
