@props([
    'label' => null,
    'items' => [],
    'placeholder' => 'Select Item',
    'triggerClass' => '',
    'value' => null,
    'name' => null,
])

@php
    $resolvedValue = $name ? old($name, $value) : $value;
    $finalValue = $resolvedValue ?? ($items[0] ?? null);
@endphp

<div class="w-full">

    @if ($label)
        <label class="pb-3 text-primary text-sm font-normal block">
            {{ $label }}
        </label>
    @endif

    <div class="relative z-10 group w-full" data-input-dropdown-component>
        <div @class([
            'grid grid-cols-[auto_1fr_auto] w-full py-4 px-4 pr-2 bg-input-background border rounded-sm shadow-soft gap-2 animate-cta hover:border-secondary',
            $triggerClass,
        ]) data-input-dropdown-trigger>
            <div data-input-dropdown-trigger-content class="flex gap-2 items-center text-sm">
                {{ $finalValue ?? $placeholder }}
            </div>
            <input type="hidden" data-input-dropdown-storage name="{{ $name }}" value="{{ $finalValue }}">
            <iconify-icon data-input-dropdown-trigger-chevron class="rotate-180 text-lg"
                icon="tabler:chevron-up"></iconify-icon>
        </div>
        <div class="absolute inset-0 top-16 border h-fit bg-white shadow-soft rounded-sm group-data-[state=open]:opacity-100 group-data-[state=open]:visible group-data-[state=open]:translate-y-0 group-data-[state=open]:scale-100  opacity-0 invisible -translate-y-4 scale-95 transition-all duration-200 p-1 max-h-48 overflow-y-auto"
            data-input-dropdown-content>
            @foreach ($items as $item)
                <div data-input-dropdown-item="{{ $item }}"
                    data-input-dropdown-state={{ $finalValue == $item ? 'active' : 'inactive' }}
                    class="flex items-center justify-between px-4 py-2 rounded-sm text-sm hover:bg-secondary/5 data-[input-dropdown-state=active]:bg-secondary/5 group animate-cta text-secondary data-[input-dropdown-state=active]:text-primary">
                    <p>
                        {{ $item }}
                    </p>
                    <div class="rounded-full border p-1">
                        <div @class([
                            'bg-tetiary w-2 h-2 rounded-full group-data-[input-dropdown-state=active]:bg-accent',
                        ])></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
