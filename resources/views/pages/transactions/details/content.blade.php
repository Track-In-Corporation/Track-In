@php

@endphp
<div class="flex flex-col flex-1">
    <div class="flex items-center justify-between gap-4 border-b pb-4 mt-5">
        <div class="flex gap-4 items-center">
            <div class="text-xl">{{ $transaction->code }}</div>
            @include('pages.transactions.details.status-dropdown')
        </div>
        <div class="flex items-center gap-3">
            @if ($transaction->status === 'pending')
                <a href="{{ route('transaction-edit', ['id' => $transaction->id]) }}"
                    class="hover:border-secondary hover:*:text-primary animate-cta p-2 w-fit border shadow-soft rounded-md flex items-center justify-center aspect-square animate-cta">
                    <iconify-icon icon="tabler:edit" class="text-xl text-secondary animate-cta"></iconify-icon>
                </a>
            @endif
            <div data-delete-button data-action={{ route('delete.transaction', $transaction->id) }}
                class="hover:border-secondary hover:*:text-red animate-cta p-2 w-fit border shadow-soft rounded-md flex items-center justify-center aspect-square animate-cta">
                <iconify-icon icon="material-symbols:delete-outline"
                    class="animate-cta text-xl text-secondary"></iconify-icon>
            </div>
        </div>
    </div>
    @include('pages.transactions.details.description')
    @include('pages.transactions.details.table')
    @include('pages.transactions.details.pricing')
</div>
