@php
    $items = [
        ['key' => 'Kode', 'size' => 'minmax(6rem,auto)'],
        ['key' => 'Jenis', 'size' => 'minmax(10rem,auto)'],
        ['key' => 'Deskripsi', 'size' => 'minmax(15rem,1fr)'],
        ['key' => 'Ukuran', 'size' => 'minmax(8rem,auto)'],
        ['key' => 'Brand', 'size' => 'minmax(8rem,auto)'],
        ['key' => 'Harga', 'size' => 'minmax(8rem,auto)'],
        ['key' => 'Stock', 'size' => 'minmax(5rem,auto)'],
        ['key' => '', 'size' => 'minmax(5rem,auto)'],
    ];
    $gridColumnSizes = array_reduce($items, function ($acc, $item) {
        return $acc . ' ' . $item['size'];
    });
    $products->appends(request()->query());
@endphp

<div class="mt-4 flex-1 relative">
    <div class="absolute inset-0 overflow-auto">
        <div class="grid border-y [&>div]:border-r [&>div]:px-4 [&>div]:py-3 bg-input-background sticky top-0 left-0 right-0"
            style="grid-template-columns: {{ $gridColumnSizes }};">
            @foreach ($items as $item)
                <div class="text-sm">{!! $item['key'] !!}</div>
            @endforeach
        </div>
        @foreach ($products as $product)
            <div data-window-trigger="{{ $product->code }}"
                class="grid [&>div]:text-sm [&>div]:px-4 [&>div]:py-4 border-b hover:bg-secondary/5 animate-cta"
                style="grid-template-columns: {{ $gridColumnSizes }};">
                <div>{{ $product['code'] }}</div>
                <div>
                    <div
                        class="bg-white shadow-soft px-3.5 py-1 border gap-2 rounded-md flex items-center justify-start w-fit">
                        <div class="bg-green w-1.5 h-1.5 rounded-full"></div>
                        {{ $product['type'] }}
                    </div>
                </div>
                <div class="leading-relaxed">{{ $product['description'] }}</div>
                <div class="">
                    <div class="bg-input-background text-secondary w-fit px-3 py-1 rounded-md">
                        {{ $product['size'] }}
                    </div>
                </div>
                <div>{{ $product['brand'] }}</div>
                <div>@formatToRupiah($product['price'])</div>
                <div>@formatNumber($product['quantity'])</div>
            </div>
        @endforeach
    </div>
</div>
<div class="flex border-t px-5 py-2 items-center gap-4">
    <div class="flex gap-4 items-center">
        <a class="hover:bg-secondary/10 animate-cta border -rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $products->previousPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
        <div class="text-sm text-secondary tracking-wide">Page <span
                class="text-primary">{{ $products->currentPage() }}</span> of
            {{ $products->lastPage() }}</div>
        <a class="hover:bg-secondary/10 animate-cta border rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $products->nextPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
    </div>
</div>
