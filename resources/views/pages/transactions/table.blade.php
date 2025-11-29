@php
    $items = [
        ['key' => 'Kode', 'size' => 'minmax(10rem,auto)'],
        ['key' => 'Penjual', 'size' => 'minmax(20rem,1fr)'],
        ['key' => 'Pembeli', 'size' => 'minmax(12rem,1fr)'],
        ['key' => 'Tanggal', 'size' => 'minmax(12rem,auto)'],
        ['key' => 'Status', 'size' => 'minmax(10rem,1fr)'],
    ];
    $gridColumnSizes = array_reduce($items, function ($acc, $item) {
        return $acc . ' ' . $item['size'];
    });
    $transactions->appends(request()->query());
@endphp

<div class="flex-1 relative">
    <div class="absolute inset-0  overflow-auto">
        <div class="grid border-y [&>div]:border-r [&>div]:px-4 [&>div]:py-3 bg-input-background sticky top-0 left-0 right-0"
            style="grid-template-columns: {{ $gridColumnSizes }};">
            @foreach ($items as $item)
                <div class="text-sm">{!! $item['key'] !!}</div>
            @endforeach
        </div>
        @foreach ($transactions as $transaction)
            <div data-window-trigger="{{ $transaction->id }}"
                class="grid [&>div]:text-sm [&>div]:px-4 [&>div]:py-3 border-b hover:bg-secondary/5 animate-cta"
                style="grid-template-columns: {{ $gridColumnSizes }};">
                <di class="flex items-center text-sm px-4">{{ $transaction['code'] }}</di>
                <div class="flex items-center gap-4">
                    <div class="w-10 aspect-square bg-background rounded-full"></div>
                    <div>
                        <p class="text-primary">{{ $transaction['user']['name'] }}</p>
                        <p class="text-sm text-secondary">{{ $transaction['user']['email'] }}</p>
                    </div>
                </div>
                <div>{{ $transaction['recipient_name'] }}</div>
                <div class="">{{ $transaction['formatted_date'] }}</div>
                <div>
                    <x-status-badge variant="{{ $transaction['status'] }}"></x-status-badge>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="flex border-t px-5 py-2 items-center gap-4">
    <div class="flex gap-4 items-center">
        <a class="hover:bg-secondary/10 animate-cta border -rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $transactions->previousPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
        <div class="text-sm text-secondary tracking-wide">Page <span
                class="text-primary">{{ $transactions->currentPage() }}</span> of
            {{ $transactions->lastPage() }}</div>
        <a class="hover:bg-secondary/10 animate-cta border rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $transactions->nextPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
    </div>
</div>
