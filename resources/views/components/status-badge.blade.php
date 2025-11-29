@props([
    'variant' => 'pending',
])

@php
    $variants = [
        'pending' => [
            'display' => 'Pending',
            'styles' => 'bg-[#F8F8F8] text-secondary',
        ],
        'on-delivery' => [
            'display' => 'Pengiriman',
            'styles' => 'text-[#3034FE] bg-[#F2F2FF]',
        ],
        'waiting-payment' => [
            'display' => 'Selesai',
            'styles' => 'bg-[#EEFDFA] text-[#38A897]',
        ],
        'completed' => [
            'display' => 'Pembayaran',
            'styles' => 'bg-[#FFF1F4] text-[#DD4C76]',
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
