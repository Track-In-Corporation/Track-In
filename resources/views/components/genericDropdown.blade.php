@props([
'label' => null,
'items' => [],
'name',
'value' => null,
])

@php
$selected = old($name) ?? $value ?? ($items[0] ?? null);
@endphp

<div class="w-full">
    @if ($label)
        <label class="block text-sm font-normal text-primary">{{ $label }}</label>
    @endif

<select name="{{ $name }}" class="w-full border rounded-sm py-4 px-3 text-sm text-primary mt-4">
    @foreach ($items as $item)
        <option value="{{ $item }}" {{ $selected === $item ? 'selected' : '' }}>
            {{ $item }}
        </option>
    @endforeach
</select>

</div>
