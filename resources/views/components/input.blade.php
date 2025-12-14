@props([
    'label' => null,
    'hint' => null,
    'placeholder' => '',
    'inputClass' => '',
    'error' => null,
    'numeric' => false,
    'value' => null,
    'name' => null,
    'type' => null,
])

<div {{ $attributes->merge(['class' => 'w-full']) }}
    @if ($type == 'password') data-password-input data-state="show" @endif>
    @if ($label)
        <label class="pb-2 text-primary text-sm font-normal block">
            {{ $label }}
        </label>
    @endif

    <div data-state class="shadow-soft relative">
        <input @class([
            'border border-border bg-highlight rounded-sm w-full px-5 py-4 text-primary disabled:text-slate-500 transition duration-75 placeholder:text-paragraph text-sm focus:ring-accent focus:ring-2 outline-none disabled:cursor-not-allowed placeholder:font-normal font-normal bg-input-background data-[state=error]:border-red-500',
            'border-red-400' => $error,
            $inputClass,
        ]) @if ($type == 'password') data-input @endif
            placeholder="{{ $placeholder }}" @if ($type) type="{{ $type }}" @endif
            @if ($name) name="{{ $name }}" @endif
            @if ($value) value="{{ $value }}" @endif
            @if ($numeric) inputmode="numeric" @endif>
        @if ($type == 'password')
            <iconify-icon icon="oui:eye-closed" data-icon
                class="absolute text-lg right-6 top-1/2 -translate-y-1/2"></iconify-icon>
        @endif
    </div>

    @if (!$error && $hint)
        <p class="text-xs text-paragraph mt-2 leading-[150%]">
            {{ $hint }}
        </p>
    @endif

    @if ($error)
        <div class="flex items-center gap-2 mt-2 text-red-400">
            <svg class="fill-red-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path
                    d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z">
                </path>
                <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
            </svg>
            <p class="text-sm font-normal">
                {{ $error }}{{ $hint ? ', ' . strtolower($hint) : '' }}
            </p>
        </div>
    @endif
</div>
