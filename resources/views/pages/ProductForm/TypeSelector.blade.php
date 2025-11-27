@php
    $inventoryTypes = [
        'Materials'    => 'icon-park-outline:ad-product',
        'Chemicals'    => 'solar:flame-bold',
        'Raw Parts'    => 'ri:wrench-line',
        'Consumables'  => 'mdi:package-variant-closed',
    ];

    $types = $types->isNotEmpty()
        ? $types
        : collect(array_keys($inventoryTypes));

    // $selected = old('type', $product->type ?? null);
    $selected = old('type');
@endphp

<ul class="border bg-background rounded-md grid grid-cols-2 p-4 gap-3 mt-4 shadow-soft">
    @foreach ($types as $type)
        @php
            $isSelected = $selected === $type;
            $icon = $inventoryTypes[$type] ?? 'mdi:help-circle-outline';
        @endphp

        <li
            class="type-option flex items-center gap-2 bg-white px-3 py-2 rounded-sm border shadow-soft transition cursor-pointer
                   {{ $isSelected ? 'border-accent outline-[1px] outline-accent' : 'hover:border-accent/50' }}"
            onclick="
                document.getElementById('type-input').value = '{{ $type }}';
                document.querySelectorAll('.type-option').forEach(el => el.classList.remove('selected-type'));
                this.classList.add('selected-type');
            "
        >
            <div class="p-1.5 rounded-full bg-accent/5 w-10 h-10 flex items-center justify-center">
                <iconify-icon icon="{{ $icon }}" width="20" height="20" class="text-accent"></iconify-icon>
            </div>

            <p class="font-medium text-sm">{{ $type }}</p>

            <p class="text-white bg-accent rounded-full px-2 text-xs ml-auto transition
                {{ $isSelected ? 'opacity-100' : 'opacity-0' }}">
                Terpilih
            </p>
        </li>
    @endforeach
</ul>

<input type="hidden" name="type" id="type-input" value="{{ $selected }}">
