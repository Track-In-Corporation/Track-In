@php
    $tabs = [
        [
            "type" => "materials",
            "display" => "Materials",
            "icon" => "icon-park-outline:ad-product",
        ],
        [
            "type" => "chemicals",
            "display" => "Chemicals",
            "icon" => "solar:flame-bold",
        ],
        [
            "type" => "raw-parts",
            "display" => "Raw Parts",
            "icon" => "ri:wrench-line",
        ],
        [
            "type" => "consumables",
            "display" => "Consumables",
            "icon" => "mingcute:paper-line",
        ],
    ];
@endphp
<div class="">
    <h1 class="text-[1.6rem] tracking-tight mb-6">Inventory</h1>
    <div class="flex gap-4 items-center border-b">
        @foreach ($tabs as $tab)
            @php
                $isSelected = request()->query("type") === $tab["type"];
            @endphp
            <a @class([
                "flex gap-3 items-center text-secondary relative pb-3 px-4",
                "hover:opacity-50 animate-cta" => !$isSelected,
            ]) href={{ route("inventory", ["type" => $tab["type"]]) }}>
                <iconify-icon @class(["text-xl", "text-primary" => $isSelected]) icon={{ $tab["icon"] }}></iconify-icon>
                <div @class(["text-sm", "text-primary" => $isSelected])>{{ $tab["display"] }}</div>
                <div @class([
                    "bg-accent h-[3px] w-full absolute bottom-0 left-0 right-0 opacity-0",
                    "opacity-100" => $isSelected,
                ])></div>
            </a>
        @endforeach
    </div>
</div>
