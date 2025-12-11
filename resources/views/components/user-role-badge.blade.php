@props([
    'variant' => 'user',
    'class' => '',
])
@php
    $variants = [
        'admin' => [
            'display' => 'Administrator',
            'icon' => 'mingcute:badge-line',
            'styles' => 'text-[#4F30FE] bg-[#EBECFF]',
        ],
        'user' => [
            'display' => 'User',
            'icon' => 'tabler:user-edit',
            'styles' => 'text-[#7B92C0] bg-[#F3F7FF]',
        ],
    ];
    $selected = $variants[$variant];
@endphp

<div @class([
    'px-2 py-0.5 gap-2  rounded-sm w-max flex items-center justify-center',
    $selected['styles'],
    $class,
])>
    <iconify-icon class="text-lg" icon="{{ $selected['icon'] }}"></iconify-icon>
    <p class="text-sm">{{ $selected['display'] }}</p>
</div>
