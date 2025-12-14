<div class="flex flex-col gap-4">
    <x-input-dropdown triggerClass="py-3" label="{{ __('messages.inventory.detail.brand') }}" name="brand"
        :items="$brands" :value="old('brand', $product->brand ?? '')" :error="$errors->first('brand')">
    </x-input-dropdown>
    <x-input label="{{ __('messages.inventory.detail.hs_code') }}" placeholder="73072110" class="mt-1" name="hs_code"
        :value="old('hs_code', $product->hs_code ?? '')" :error="$errors->first('hs_code')" />
    <x-input label="{{ __('messages.inventory.detail.origin') }}" placeholder="Germany" class="mt-1"
        name="country_origin" :value="old('country_origin', $product->country_origin ?? '')" :error="$errors->first('country_origin')" />
    <x-input label="{{ __('messages.inventory.detail.sch') }}" placeholder="40S" class="mt-1" name="sch"
        :value="old('sch', $product->sch ?? '')" :error="$errors->first('sch')" />
</div>
