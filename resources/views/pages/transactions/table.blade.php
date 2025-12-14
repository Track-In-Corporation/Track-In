@php
    $items = [
        ['key' => __('messages.transactions.col.code'), 'size' => 'minmax(10rem,auto)'],
        ['key' => __('messages.transactions.col.seller'), 'size' => 'minmax(20rem,1fr)'],
        ['key' => __('messages.transactions.col.buyer'), 'size' => 'minmax(12rem,1fr)'],
        ['key' => __('messages.transactions.col.date'), 'size' => 'minmax(12rem,auto)'],
        ['key' => __('messages.transactions.col.status'), 'size' => 'minmax(10rem,1fr)'],
    ];
    $gridColumnSizes = array_reduce($items, function ($acc, $item) {
        return $acc . ' ' . $item['size'];
    });
    $transactions->appends(request()->query());
@endphp

<div class="flex-1 relative">
    <div class="absolute inset-0  overflow-auto">
        <div class="relative flex flex-col h-full">
            <div class="grid [&>div]:border-y [&>div]:border-r [&>div]:px-4 [&>div]:py-3 [&>div]:bg-input-background sticky top-0 left-0 right-0"
                style="grid-template-columns: {{ $gridColumnSizes }};">
                @foreach ($items as $item)
                    <div class="text-sm">{!! $item['key'] !!}</div>
                @endforeach
            </div>
            @if (count($transactions) == 0)
                <div class="flex p-4 flex-1 h-full flex-col items-center justify-center">
                    <div
                        class="flex w-full h-full rounded-md flex-col items-center justify-center border-2 border-dashed">
                        <iconify-icon icon="material-symbols:error-outline"
                            class="text-[5rem] mb-4 text-secondary"></iconify-icon>
                        <p class="text-2xl font-medium">Transaksi Tidak Ditemukan</p>
                        <p class="text-secondary mt-1">Sepertinya tidak ada transaksi yang dapat ditampilkan</p>
                    </div>
                </div>
            @endif
            @foreach ($transactions as $transaction)
                <div data-window-trigger="{{ $transaction->id }}"
                    class="grid [&>div]:text-sm [&>div]:px-4 [&>div]:py-3 [&>div]:border-b hover:bg-secondary/5 animate-cta"
                    style="grid-template-columns: {{ $gridColumnSizes }};">
                    <div class="flex items-center text-sm px-4">{{ $transaction['code'] }}</div>
                    <div class="flex items-center gap-4">
                        @if ($transaction->user->profile_picture_path)
                            <img src="{{ $transaction->user->profile_picture_path }}"
                                class="w-10 aspect-square bg-background rounded-full object-cover"></img>
                        @else
                            <div class="w-10 aspect-square bg-background rounded-full"></div>
                        @endif
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
