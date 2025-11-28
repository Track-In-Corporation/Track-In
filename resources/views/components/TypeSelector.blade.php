@php
    $inventoryTypes = [
        'materials'    => 'icon-park-outline:ad-product',
        'chemicals'    => 'solar:flame-bold',
        'raw-parts'    => 'ri:wrench-line',
        'consumables'  => 'mingcute:paper-line',
    ];

    $selected = old('type');
@endphp

<ul class="border bg-background rounded-md grid grid-cols-2 p-4 gap-3 mt-4 shadow-soft">
    @foreach ($types as $type)
        @php
            $isSelected = $selected === $type;
            $icon = $inventoryTypes[$type];
        @endphp

        <li
            class="type-option flex items-center gap-2 bg-white px-3 py-2 rounded-sm border shadow-soft transition cursor-pointer
                   {{ $isSelected ? 'border-accent outline-[1px] outline-accent' : 'hover:border-accent/50' }}"
            onclick="
                document.getElementById('type-input').value = '{{ $type }}';

                document.querySelectorAll('.type-option').forEach(el => {
                    el.classList.remove('border-accent', 'outline-accent');
                    el.querySelector('.selected-badge').classList.add('opacity-0');
                });

                this.classList.add('border-accent', 'outline-accent');
                this.querySelector('.selected-badge').classList.remove('opacity-0');
            "
        >
            <div class="p-1.5 rounded-full bg-accent/5 w-10 h-10 flex items-center justify-center">
                <iconify-icon icon="{{ $icon }}" width="20" height="20" class="text-accent"></iconify-icon>
            </div>

            <p class="font-medium text-sm">{{ $type }}</p>

            <p class="selected-badge text-white bg-accent rounded-full px-2 text-xs ml-auto transition {{ $isSelected ? 'opacity-100' : 'opacity-0' }}">
                Terpilih
            </p>

        </li>
    @endforeach
</ul>

<input type="hidden" name="type" id="type-input" value="{{ $selected }}">
