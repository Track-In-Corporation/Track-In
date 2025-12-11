@php
    $items = [
        ['key' => __('messages.inventory.col.code'), 'size' => 'minmax(8rem,auto)'],
        ['key' => __('messages.inventory.col.description'), 'size' => 'minmax(10rem,1fr)'],
        ['key' => __('messages.inventory.col.price'), 'size' => 'minmax(10rem,auto)'],
        ['key' => __('messages.utils.units'), 'size' => 'minmax(5rem,auto)'],
        ['key' => __('messages.utils.total'), 'size' => 'minmax(5rem,1fr)'],
    ];
    $gridColumnSizes = array_reduce($items, function ($acc, $item) {
        return $acc . ' ' . $item['size'];
    });
@endphp
<h2 class="text-primary font-medium text-base mt-2">Detil Produk</h2>
<div class="mt-4 flex-1 relative h-full min-h-max  overflow-auto">
    <div class="">
        <div class="grid [&>div]:px-4 [&>div]:py-2 rounded-lg [&>div]:bg-input-background sticky top-0 left-0 right-0"
            style="grid-template-columns: {{ $gridColumnSizes }};">
            @foreach ($items as $i => $item)
                <div @class([
                    'text-sm text-primary/60',
                    $i == count($items) - 1 ? 'text-right' : '',
                ])>{!! $item['key'] !!}</div>
            @endforeach
        </div>
        @foreach ($transaction->items as $item)
            <div class="grid [&>div]:text-sm [&>div]:px-4 [&>div]:py-4 [&>div]:border-b"
                style="grid-template-columns: {{ $gridColumnSizes }};">
                <div>
                    <div class="text-sm bg-input-background px-4 py-0.5 rounded-full w-fit">
                        {{ $item->product->code }}
                    </div>
                </div>
                <div class="truncate">{{ $item->product->description }}</div>
                <div class="truncate">@formatToRupiah($item->price)</div>
                <div class="truncate">@formatNumber($item->quantity)</div>
                <div class="truncate text-end">@formatToRupiah($item->quantity * $item->price)</div>
            </div>
        @endforeach

    </div>
</div>
</div>
