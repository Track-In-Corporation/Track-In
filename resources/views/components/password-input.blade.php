@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'value' => null,
    'name' => null,
])

<div class="relative" data-password-input data-state="show">
    <x-input placeholder="*******" name="{{ $name }}" value="{{ $value }}" data-input
        type="password"></x-input>
    <iconify-icon icon="oui:eye" data-icon class="absolute text-lg right-6 top-1/2 -translate-y-1/2"></iconify-icon>
</div>
