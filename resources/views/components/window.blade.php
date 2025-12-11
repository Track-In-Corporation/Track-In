@props([
    'key' => null,
    'width' => '35rem',
    'name' => null,
    'state' => 'closed',
])

<div data-window-component-state="{{ $state }}" data-window-component="{{ $name }}"
    @class([
        'data-[window-component-state=open]:opacity-100 data-[window-component-state=open]:visible fixed inset-0 z-9999 bg-black/40 opacity-0 invisible flex justify-end p-2 transition-all duration-200  group md:p-0',
    ])>
    <div data-window-content @class([
        'bg-background p-3 h-full rounded-2xl shadow-[0_0_8px_0_rgba(0,0,0,0.05)] transition-all duration-200 group-data-[window-component-state=open]:translate-x-0 translate-x-6 md:w-full! md:p-0 md:rounded-none',
    ]) style="width:{{ $width }}">
        <div class="bg-white shadow-[0_0_8px_0_rgba(0,0,0,0.05)] h-full rounded-xl flex flex-col border">
            {{ $slot }}
        </div>
    </div>
</div>
