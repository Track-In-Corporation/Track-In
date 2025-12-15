@php
    $items = [
        ['key' => __('messages.inventory.col.code'), 'size' => 'minmax(6rem,auto)'],
        ['key' => __('messages.inventory.col.type'), 'size' => 'minmax(10rem,auto)'],
        ['key' => __('messages.inventory.col.description'), 'size' => 'minmax(15rem,1fr)'],
        ['key' => __('messages.inventory.col.size'), 'size' => 'minmax(8rem,auto)'],
        ['key' => __('messages.inventory.col.brand'), 'size' => 'minmax(8rem,auto)'],
        ['key' => __('messages.inventory.col.price'), 'size' => 'minmax(8rem,auto)'],
        ['key' => __('messages.inventory.col.stock'), 'size' => 'minmax(5rem,auto)'],
    ];
    $gridColumnSizes = array_reduce($items, function ($acc, $item) {
        return $acc . ' ' . $item['size'];
    });
    $products->appends(request()->query());
@endphp

<div class="mt-4 flex-1 relative">
    <div class="absolute inset-0 overflow-auto">
        <div class="relative flex flex-col h-full">

            <div class="grid [&>div]:border-y [&>div]:border-r [&>div]:px-4 [&>div]:py-3 bg-input-background sticky top-0 left-0 right-0 [&>div]:bg-input-background"
                style="grid-template-columns: {{ $gridColumnSizes }};">
                @foreach ($items as $item)
                    <div class="text-sm">{!! $item['key'] !!}</div>
                @endforeach
            </div>
            @if (count($products) == 0)
                <div class="flex p-4 flex-1 h-full flex-col items-center justify-center">
                    <div
                        class="flex w-full h-full rounded-md flex-col items-center justify-center border-2 border-dashed">
                        <iconify-icon icon="material-symbols:error-outline"
                            class="text-[5rem] mb-4 text-secondary"></iconify-icon>
                        <p class="text-2xl font-medium">{{ __('messages.error_message.product_not_found') }}</p>
                        <p class="text-secondary mt-1">{{ __('messages.error_message.product_not_found_desc') }}</p>
                    </div>
                </div>
            @endif
            @foreach ($products as $product)
                <div data-window-trigger="{{ $product->code }}"
                    class="grid [&>div]:text-sm [&>div]:px-4 [&>div]:py-4 [&>div]:border-b group hover:[&>div]:bg-secondary/5 animate-cta [&>div]:bg-white cursor-pointer"
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
</div>
<div class="flex border-t px-5 py-2 items-center gap-4">
    <div class="flex gap-4 items-center">
        <a class="hover:bg-secondary/10 animate-cta border -rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $products->previousPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
        <div class="text-sm text-secondary tracking-wide">{{ __('messages.utils.page') }} <span
                class="text-primary">{{ $products->currentPage() }}</span> {{ __('messages.utils.of') }}
            {{ $products->lastPage() }}</div>
        <a class="hover:bg-secondary/10 animate-cta border rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $products->nextPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
    </div>
</div>
