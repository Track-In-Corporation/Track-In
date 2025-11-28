@props([
    'label' => null,
    'hint' => null,
    'placeholder' => '',
    'inputClass' => '',
    'error' => null,
    'numeric' => false,
])

<div {{ $attributes->merge(['class' => 'w-full']) }}>
    @if($label)
        <label class="pb-2 text-primary text-sm font-normal block">
            {{ $label }}
        </label>
    @endif

    <div class="shadow-soft">
        <input
            {{ $attributes->merge(['class' =>
                "border border-border bg-highlight rounded-sm w-full px-5 py-4
                text-primary disabled:text-slate-500 transition duration-75
                placeholder:text-paragraph text-sm focus:ring-accent focus:ring-2
                outline-none disabled:cursor-not-allowed placeholder:font-normal
                font-normal bg-background " .
                ($error ? 'border-red-400 ' : '') .
                $inputClass
            ]) }}
            placeholder="{{ $placeholder }}"
            @if($numeric) inputmode="numeric" @endif
        >
    </div>

    @if(!$error && $hint)
        <p class="text-xs text-paragraph mt-2 leading-[150%]">
            {{ $hint }}
        </p>
    @endif

    @if($error)
        <div class="flex items-center gap-2 mt-2 text-red-400">
            <svg class="fill-red-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                 viewBox="0 0 24 24">
                <path d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z"></path>
                <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
            </svg>
            <p class="text-sm font-normal">
                {{ $error }}{{ $hint ? ', ' . strtolower($hint) : '' }}
            </p>
        </div>
    @endif
</div>
