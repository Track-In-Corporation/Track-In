<div class="flex flex-col gap-4">
    <x-input
        label="Harga Satuan"
        placeholder="Rp 90.000"
        class="mt-1"
        name="price"
        :value="old('price')"
        :error="$errors->first('price')"
    />
    <div>
        <p class="text-sm mb-2.5">Stock</p>
        <div class="flex gap-4">
            <x-input
                type="number"
                name="quantity"
                placeholder="0"
                :value="old('quantity')"
                :error="$errors->first('quantity')"
            />
            <button type="button" class="flex items-center justify-center h-14 text-3xl aspect-square bg-white border border-gray-200 rounded-sm shadow-soft cursor-pointer"
                onclick="decrementStock(this)">-</button>
            <button type="button" class="flex items-center justify-center h-14 text-3xl aspect-square bg-white border border-gray-200 rounded-sm shadow-soft cursor-pointer"
                onclick="incrementStock(this)">+</button>
        </div>
    </div>
</div>

<script>
    function incrementStock(btn) {
        const input = btn.parentElement.querySelector('input[type="number"]');
        input.value = parseInt(input.value || 0) + 1;
    }

    function decrementStock(btn) {
        const input = btn.parentElement.querySelector('input[type="number"]');
        input.value = Math.max(parseInt(input.value || 0) - 1, 0);
    }
</script>
