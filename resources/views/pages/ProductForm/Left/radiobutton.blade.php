@php
    $options = [
        'butuh-lartas' => [
            'label' => 'Butuh Lartas',
            'icon' => 'mingcute:paper-line',
        ],
        'butuh-sni' => [
            'label' => 'Butuh SNI',
            'icon' => 'charm:notes-tick',
        ],
    ];

    $selected = old('requirement') ? explode(',', old('requirement')) : [];
@endphp

<ul class="rounded-md grid grid-cols-2 gap-4 mt-3 shadow-soft">
    @foreach ($options as $key => $option)
        @php
            $isSelected = in_array($key, $selected);
        @endphp

        <li
            class="option flex items-center gap-2 bg-white px-3 py-2 rounded-sm border shadow-soft transition cursor-pointer
                   {{ $isSelected ? 'border-accent ring ring-accent' : 'hover:border-accent/50 border-gray-200' }}"
            onclick="
                const input = document.getElementById('requirement-input');
                let values = input.value ? input.value.split(',') : [];

                if(values.includes('{{ $key }}')){
                    values = values.filter(v => v !== '{{ $key }}');
                    this.classList.remove('border-accent', 'ring');
                    this.querySelector('.radio-circle-inner').classList.add('opacity-0');
                } else {
                    values.push('{{ $key }}');
                    this.classList.add('border-accent', 'ring');
                    this.querySelector('.radio-circle-inner').classList.remove('opacity-0');
                }

                input.value = values.join(',');
            "
        >
            <div class="p-1.5 rounded-full bg-accent/5 w-10 h-10 flex items-center justify-center">
                <iconify-icon icon="{{ $option['icon'] }}" width="20" height="20" class="text-accent"></iconify-icon>
            </div>

            <p class="font-medium text-sm">{{ $option['label'] }}</p>

            <div class="ml-auto flex items-center justify-center">
                <div class="w-6 h-6 border rounded-full flex items-center justify-center border-gray-300">
                    <div class="radio-circle-inner w-3 h-3 bg-accent rounded-full transition duration-150 {{ $isSelected ? 'opacity-100' : 'opacity-0' }}"></div>
                </div>
            </div>
        </li>
    @endforeach
</ul>

<input type="hidden" name="requirement" id="requirement-input" value="{{ implode(',', $selected) }}">
