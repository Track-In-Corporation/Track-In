@php
    $items = [
        "stock-low" =>
            '<iconify-icon class="text-xl text-red" icon="material-symbols:warning-rounded"></iconify-icon><p class="text-sm text-secondary">Stock Low</p>',
        "stock-medium" =>
            '<iconify-icon class="text-xl text-orange" icon="material-symbols:error"></iconify-icon><p class="text-sm text-secondary">Stock Medium</p>',
        "stock-ready" =>
            '<iconify-icon class="text-[1.35rem] text-green" icon="lets-icons:check-fill"></iconify-icon><p class="text-sm text-secondary">Stock Ready</p>',
    ];
    $active = request()->query("active");
    $activeElement = $active ? $items[$active] : null;
@endphp

<x-dropdown>
    <x-slot name="trigger">
        {!! $activeElement
            ? "<div class='[&_p]:text-primary! flex gap-2'>$activeElement</div>"
            : '<p class="text-secondary text-sm">Select Filter</p>' !!}
    </x-slot>
    <x-slot name="content">
        <div class="p-2 px-4 border-b">
            <p class="text-sm">Filters</p>
        </div>
        <div class="p-1 cursor-pointer">
            @foreach ($items as $key => $item)
                <x-dropdown.item id="{{ $key }}" name="slot">
                    <div class="flex items-center gap-2">
                        {!! $item !!}
                    </div>
                    {!! $key === $active ? '<div class="w-1.5 h-1.5 rounded-full bg-black/50 mr-1"></div>' : "" !!}
                </x-dropdown.item>
            @endforeach
        </div>
    </x-slot>
</x-dropdown>
