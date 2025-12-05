@php
    $items = ['admin', 'user'];
    $active = request()->query('active');
@endphp

<x-dropdown>
    <x-slot name="trigger">
        @if ($active)
            <x-user-role-badge variant="{{ $active }}"></x-user-role-badge>
        @else
            <p class="text-secondary text-sm">{{ __('messages.utils.filter') }}</p>
        @endif
    </x-slot>
    <x-slot name="content">
        <div class="p-2 px-4 border-b">
            <p class="text-sm">Filters</p>
        </div>
        <div class="p-1 cursor-pointer">
            @foreach ($items as $item)
                <x-dropdown.item id="{{ $item }}" name="slot">
                    <div class="flex items-center gap-2">
                        <x-user-role-badge variant="{{ $item }}"></x-user-role-badge>
                    </div>
                    {!! $item === $active ? '<div class="w-1.5 h-1.5 rounded-full bg-black/50 mr-1"></div>' : '' !!}
                </x-dropdown.item>
            @endforeach
        </div>
    </x-slot>
</x-dropdown>
