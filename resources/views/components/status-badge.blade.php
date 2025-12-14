@props([
    'variant' => 'pending',
])

@php
    $variants = [
        'pending' => [
            'display' => __('messages.transaction-status.pending'),
            'styles' => 'bg-[#F8F8F8] text-secondary',
        ],
        'on-delivery' => [
            'display' => __('messages.transaction-status.on-delivery'),
            'styles' => 'text-[#3034FE] bg-[#F2F2FF]',
        ],
        'waiting-payment' => [
            'display' => __('messages.transaction-status.waiting-payment'),
            'styles' => 'bg-[#FFF1F4] text-[#DD4C76]',
        ],
        'completed' => [
            'display' => __('messages.transaction-status.completed'),
            'styles' => 'bg-[#EEFDFA] text-[#38A897]',
        ],
    ];
    $selectedVariant = $variants[$variant];
@endphp

<div @class([
    'text-sm rounded-full w-fit px-4 py-0.25',
    $selectedVariant['styles'],
])>
    {{ $selectedVariant['display'] }}
</div>
