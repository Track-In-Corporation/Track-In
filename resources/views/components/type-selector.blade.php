@props([
    'useQueryRedirect' => false,
    'selected' => null,
])

@php
    $inventoryTypes = [
        'materials' => [
            'icon' => 'icon-park-outline:ad-product',
            'label' => __('messages.transactions.create.information.type.materials'),
        ],
        'chemicals' => [
            'icon' => 'solar:flame-bold',
            'label' => __('messages.transactions.create.information.type.chemicals'),
        ],
        'raw-parts' => [
            'icon' => 'ri:wrench-line',
            'label' => __('messages.transactions.create.information.type.raw_parts'),
        ],
        'consumables' => [
            'icon' => 'mingcute:paper-line',
            'label' => __('messages.transactions.create.information.type.consumables'),
        ],
    ];

    $selected = old('type', request('type', $selected ?? null));
@endphp

<ul class="border bg-input-background rounded-md grid grid-cols-2 sm:grid-cols-1 p-4 gap-3 mt-4 shadow-soft">
    @foreach ($types as $type)
        @php
            $isSelected = $selected === $type;
            $icon = $inventoryTypes[$type]['icon'];
            $label = $inventoryTypes[$type]['label'];
        @endphp

        <a class="type-option flex items-center gap-2 bg-white px-3 py-2 rounded-sm border shadow-soft transition cursor-pointer
                   {{ $isSelected ? 'border-accent outline-[1px] outline-accent' : 'hover:border-accent/50' }}"
            @if ($useQueryRedirect) href="{{ request()->fullUrlWithQuery(['type' => $type]) }}" @endif
            onclick="
                document.getElementById('type-input').value = '{{ $type }}';

                document.querySelectorAll('.type-option').forEach(el => {
                    el.classList.remove('border-accent', 'outline-accent');
                    el.querySelector('.selected-badge').classList.add('opacity-0');
                });

                this.classList.add('border-accent', 'outline-accent');
                this.querySelector('.selected-badge').classList.remove('opacity-0');
            ">
            <div class="p-1.5 rounded-full bg-accent/5 w-10 h-10 flex items-center justify-center">
                <iconify-icon icon="{{ $icon }}" width="20" height="20" class="text-accent"></iconify-icon>
            </div>

            <div class="relative flex flex-row sm:flex-col justify-between w-full sm:gap-1">
                <p class="font-medium text-sm whitespace-nowrap">{{ $label }}</p>

                <p
                    class="selected-badge text-white bg-accent rounded-full px-2 text-xs ml-auto transition {{ $isSelected ? 'opacity-100' : 'opacity-0' }}">
                    {{ __('messages.utils.chosen') }}
                </p>
            </div>
        </a>
    @endforeach
</ul>

<input type="hidden" name="type" id="type-input" value="{{ $selected }}">

@if ($error)
    <div class="flex items-center gap-2 mt-2 text-red-400">
        <svg class="fill-red-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
            <path
                d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z">
            </path>
            <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
        </svg>
        <p class="text-sm font-normal">
            {{ $error }}
        </p>
    </div>
@endif
