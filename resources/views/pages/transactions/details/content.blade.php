@php

@endphp
<div class="flex flex-col flex-1">
    <div class="flex items-center gap-4 border-b pb-4 mt-5">
        <div class="text-xl">{{ $transaction->code }}</div>
        <x-status-badge variant="{{ $transaction->status }}"></x-status-badge>
    </div>
    @include('pages.transactions.details.description')
    @include('pages.transactions.details.table')
    @include('pages.transactions.details.pricing')
</div>
