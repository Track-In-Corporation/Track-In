@php
    $options = [
        'lartas_required' => [
            'label' => 'Butuh Lartas',
            'icon' => 'mingcute:paper-line',
        ],
        'sni_required' => [
            'label' => 'Butuh SNI',
            'icon' => 'charm:notes-tick',
        ],
    ];

    $selected = old('requirement')
        ? explode(',', old('requirement'))
        : ($isEdit
            ? array_keys(array_filter([
                'lartas_required' => $product->lartas_required,
                'sni_required' => $product->sni_required,
            ]))
            : [])
@endphp

<ul class="rounded-md grid grid-cols-2 gap-4 mt-3 shadow-soft">
    @foreach ($options as $key => $option)
        @php
            $isSelected = in_array($key, $selected);
        @endphp

        <li
            class="option flex items-center gap-2 bg-white px-3 py-2 rounded-sm border shadow-soft transition cursor-pointer
                   {{ $isSelected ? 'border-gray-200' : 'hover:border-accent/50 border-gray-200' }}"
            onclick="
                const input = document.getElementById('requirement-input');
                let values = input.value ? input.value.split(',').filter(Boolean) : [];

                const key = '{{ $key }}';
                const li = this;
                const circle = li.querySelector('.radio-circle-inner');

                circle.classList.remove('initial-selected');
                circle.classList.remove('opacity-100');

                const selected = values.includes(key);

                if (selected) {
                    values = values.filter(v => v !== key);
                    li.classList.remove('border-accent', 'ring', 'ring-accent');
                    li.classList.add('border-gray-200', 'hover:border-accent/50');

                    circle.classList.add('opacity-0');
                } else {
                    values.push(key);
                    li.classList.remove('border-gray-200', 'hover:border-accent/50');
                    li.classList.add('border-accent', 'ring', 'ring-accent');

                    circle.classList.remove('opacity-0');
                    circle.classList.add('opacity-100');
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
                    <div class="radio-circle-inner w-3 h-3 bg-accent rounded-full transition duration-150 {{ $isSelected ? 'opacity-100 initial-selected' : 'opacity-0' }}"></div>

                </div>
            </div>
        </li>
    @endforeach
</ul>

<input type="hidden" name="requirement" id="requirement-input" value="{{ implode(',', $selected) }}">


@if($errors->has('requirement'))
    <div class="flex items-center gap-2 mt-2 text-red-400">
        <svg class="fill-red-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
             viewBox="0 0 24 24">
            <path d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z"></path>
            <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
        </svg>
        <p class="text-sm font-normal">{{ $errors->first('requirement') }}</p>
    </div>
@endif
