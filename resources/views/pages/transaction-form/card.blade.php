@props([
    'item',
    'value' => 0,
])

<div class="border flex flex-col rounded-md transition duration-75 p-0 h-full hover:border-accent cursor-pointer" data-product-card>
    <div class="inline-block px-6 py-1 border-b bg-accent rounded-full w-fit m-6">
        <p class=" text-white">
            {{ $item->code }}
        </p>
    </div>

    <div class="px-6 pb-4 flex flex-col justify-between flex-1 gap-4">
        <p class="block text-primary leading-[175%] line-clamp-2">
            {{ $item->description }}
        </p>

        <div class="grid grid-cols-[2fr_1.5fr] gap-2 [&>p]:text-secondary [&>p>span]:text-primary py-2 gap-y-3 [&>p>span]:ml-4">
            <p class="truncate">Stock  <span class="stock-display">{{ $item->quantity }}</span></p>
            <p>Ukuran  <span>{{ $item->size }}</span></p>
            <p class="truncate">Harga  <span>@formatToRupiah($item->price)</span></p>
            <p>Satuan  <span>{{ $item->unit }}</span></p>
        </div>

        <div class="mt-auto flex items-center justify-between gap-4 mb-1">
            <button
                type="button"
                class="flex items-center justify-center h-14 w-14 text-3xl bg-white border border-gray-200 rounded-sm shadow-soft flex-shrink-0 cursor-pointer"
                onclick="decrementQty(this)"
            >
                -
            </button>

            <x-input
                type="number"
                input-class="quantity-input text-center h-14"
                placeholder="0"
                :value="$value"
                oninput="typeQuantity(this)"
            />


            <button
                type="button"
                class="flex items-center justify-center h-14 w-14 text-3xl bg-white border border-gray-200 rounded-sm shadow-soft flex-shrink-0 cursor-pointer"
                onclick="incrementQty(this)"
            >
                +
            </button>

        </div>
    </div>

    <input type="hidden" name="products[{{ $item->code }}]" class="hidden-qty" value="{{ $value }}">
    <input type="hidden" class="hidden-stock" value="{{ $item->quantity }}">
</div>

<script>
    function incrementQty(btn) {
        const card = btn.closest('div.border');
        const qtyInput = card.querySelector('.quantity-input');
        const hiddenQty = card.querySelector('.hidden-qty');
        const stockDisplay = card.querySelector('.stock-display');
        const hiddenStock = card.querySelector('.hidden-stock');

        let qty = parseInt(qtyInput.value || 0);
        let stock = parseInt(hiddenStock.value || 0);

        if (stock <= 0) return;

        qty++;
        stock--;

        qtyInput.value = qty;
        hiddenQty.value = qty;
        stockDisplay.textContent = stock;
        hiddenStock.value = stock;
    }

    function decrementQty(btn) {
        const card = btn.closest('div.border');
        const qtyInput = card.querySelector('.quantity-input');
        const hiddenQty = card.querySelector('.hidden-qty');
        const stockDisplay = card.querySelector('.stock-display');
        const hiddenStock = card.querySelector('.hidden-stock');

        let qty = parseInt(qtyInput.value || 0);
        let stock = parseInt(hiddenStock.value || 0);

        if (qty <= 0) return;

        qty--;
        stock++;

        qtyInput.value = qty;
        hiddenQty.value = qty;
        stockDisplay.textContent = stock;
        hiddenStock.value = stock;
    }

    function typeQuantity(input) {
        const card = input.closest('div.border');
        const hiddenQty = card.querySelector('.hidden-qty');
        const stockDisplay = card.querySelector('.stock-display');
        const hiddenStock = card.querySelector('.hidden-stock');

        let typed = parseInt(input.value || 0);
        let currentHiddenQty = parseInt(hiddenQty.value || 0);
        let stock = parseInt(hiddenStock.value || 0);

        if (typed < 0) typed = 0;

        const diff = typed - currentHiddenQty;

        if (diff > stock) {
            input.value = hiddenQty.value;
            return;
        }


        stock -= diff;

        hiddenStock.value = stock;
        stockDisplay.textContent = stock;

        hiddenQty.value = typed;
    }
</script>
