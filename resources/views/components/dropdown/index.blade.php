<div class="relative z-10 group" data-dropdown-component>
    <div class="grid grid-cols-[auto_1fr_auto] w-60 py-1.5 px-3 bg-input-background border rounded-md shadow-soft gap-2 animate-cta hover:opacity-50"
        data-dropdown-trigger>
        <iconify-icon class="text-lg" icon="mynaui:filter"></iconify-icon>
        <div class="flex gap-1">
            {{ $trigger }}
        </div>
        <iconify-icon class="rotate-180 text-lg" icon="tabler:chevron-up"></iconify-icon>
    </div>
    <div class="absolute inset-0 top-11 border h-fit bg-white shadow-soft rounded-md group-data-[state=open]:opacity-100 group-data-[state=open]:visible group-data-[state=open]:translate-y-0 group-data-[state=open]:scale-100  opacity-0 invisible -translate-y-4 scale-95 transition-all duration-200"
        data-dropdown-content>
        {{ $content }}
    </div>
</div>
