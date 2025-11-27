@php
    $navigations = [
        [
            "display" => "Inventory",
            "link" => "/inventory",
            "icon" => "tabler:box",
        ],
        [
            "display" => "Transaction",
            "link" => "/transaction",
            "icon" => "mdi:cart-outline",
        ],
        [
            "display" => "User",
            "link" => "/users",
            "icon" => "mdi:user-outline",
        ],
    ];
@endphp
<nav class="px-2 navbar relative">
    <div class="pt-4 pb-2">
        <iconify-icon icon="mingcute:box-line"
            class="bg-white text-2xl text-accent p-2.5 rounded-md border shadow-soft" />
    </div>
    <div class="w-full h-px bg-border relative">
        <div class="-translate-y-1/2 top-1 right-0 translate-x-5 absolute hover:opacity-60 animate-cta navbar__toggle">
            <iconify-icon icon="line-md:chevron-right"
                class="group-data-[navbar-state=open]:rotate-180 animate-cta bg-white text-base text-secondary rounded-full p-1 border shadow-soft"></iconify-icon>
        </div>
    </div>
    <ul class="py-2 grid">
        @foreach ($navigations as $nav)
            <li
                class="flex items-center justify-start gap-2 overflow-hidden p-2.5 hover:bg-secondary/10 animate-cta group rounded-sm">
                <iconify-icon icon="{{ $nav["icon"] }}" class="text-2xl text-secondary"></iconify-icon>
                <p
                    class="text-primary font-medium group-data-[navbar-state=closed]:opacity-0 min-w-0 transition-all truncate">
                    {{ $nav["display"] }}</p>
            </li>
        @endforeach
    </ul>
    {{-- <div class="bg-white border rounded-full w-10 aspect-square flex items-center justify-center">O</div> --}}
</nav>
