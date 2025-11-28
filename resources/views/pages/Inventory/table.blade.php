@php
    $data = [
        [
            "code" => "PR001",
            "type" => "Material",
            "description" =>
                "Stainless steel rod suitable for small mechanical parts, known for its durability and corrosion resistance.",
            "size" => "5.5mm",
            "price" => 10000,
            "unit" => "Pcs",
            "quantity" => 5,
        ],
        [
            "code" => "PR002",
            "type" => "Material",
            "description" =>
                "High-quality copper wire roll commonly used for electrical wiring, offering excellent conductivity and flexibility.",
            "size" => "2mm",
            "price" => 15000,
            "unit" => "Pcs",
            "quantity" => 12,
        ],
        [
            "code" => "PR003",
            "type" => "Equipment",
            "description" =>
                "Portable hand drill ideal for wood, plastic, and light metalwork, designed with an ergonomic grip for stability.",
            "size" => "Medium",
            "price" => 250000,
            "unit" => "Pcs",
            "quantity" => 2,
        ],
        [
            "code" => "PR004",
            "type" => "Material",
            "description" =>
                "Lightweight aluminium sheet used for construction, crafting, and machine panels, offering strength with low weight.",
            "size" => "1m x 2m",
            "price" => 75000,
            "unit" => "Pcs",
            "quantity" => 4,
        ],
        [
            "code" => "PR005",
            "type" => "Tool",
            "description" =>
                "Complete wrench set made from hardened steel, suitable for automotive repairs and general maintenance tasks.",
            "size" => "10pcs",
            "price" => 120000,
            "unit" => "Pcs",
            "quantity" => 3,
        ],
        [
            "code" => "PR006",
            "type" => "Material",
            "description" =>
                "Pack of durable iron nails used for wood framing, carpentry projects, and various household construction needs.",
            "size" => "8cm",
            "price" => 8000,
            "unit" => "Pcs",
            "quantity" => 25,
        ],
        [
            "code" => "PR007",
            "type" => "Equipment",
            "description" =>
                "Heavy-duty angle grinder built for cutting and grinding metal surfaces, featuring a high-speed motor for efficiency.",
            "size" => "4-inch",
            "price" => 320000,
            "unit" => "Pcs",
            "quantity" => 1,
        ],
        [
            "code" => "PR008",
            "type" => "Material",
            "description" =>
                "PVC pipe suitable for plumbing installations, resistant to corrosion and designed for long-term water flow systems.",
            "size" => "1-inch x 4m",
            "price" => 20000,
            "unit" => "Pcs",
            "quantity" => 10,
        ],
        [
            "code" => "PR009",
            "type" => "Tool",
            "description" =>
                "Multi-size screwdriver set containing flat and Phillips heads, perfect for home repairs, electronics, and assembly work.",
            "size" => "6pcs",
            "price" => 30000,
            "unit" => "Pcs",
            "quantity" => 6,
        ],
        [
            "code" => "PR010",
            "type" => "Material",
            "description" =>
                "Assorted bolts and nuts pack made from galvanized steel, commonly used for fastening metal and wooden components securely.",
            "size" => "M6",
            "price" => 9000,
            "unit" => "Pcs",
            "quantity" => 15,
        ],
    ];
    $items = [
        [
            "key" => "Kode",
            "size" => "minmax(6rem,auto)",
        ],
        [
            "key" => "Jenis",
            "size" => "minmax(8rem,auto)",
        ],
        [
            "key" => "Deskripsi",
            "size" => "minmax(15rem,1fr)",
        ],
        [
            "key" => "Ukuran",
            "size" => "minmax(8rem,auto)",
        ],
        [
            "key" => "Satuan",
            "size" => "minmax(8rem,auto)",
        ],
        [
            "key" => "Harga",
            "size" => "minmax(8rem,auto)",
        ],
        [
            "key" => "Jumlah",
            "size" => "minmax(10rem,auto)",
        ],
    ];
    $gridColumnSizes = array_reduce($items, function ($acc, $item) {
        return $acc . " " . $item["size"];
    });
@endphp

<div class="mt-4 relative flex-1">
    <div class="absolute inset-0 overflow-auto">
        <div class="grid border-y [&>div]:px-4 [&>div]:py-3 bg-input-background sticky top-0 left-0 right-0"
            style="grid-template-columns: {{ $gridColumnSizes }};">
            @foreach ($items as $item)
                <div class="text-sm">{!! $item["key"] !!}</div>
            @endforeach
        </div>
        @foreach ($data as $item)
            <div class="grid [&>div]:text-sm [&>div]:px-4 [&>div]:py-4 border-b hover:bg-secondary/5 animate-cta"
                style="grid-template-columns: {{ $gridColumnSizes }};">
                <div>{{ $item["code"] }}</div>
                <div>{{ $item["type"] }}</div>
                <div class="leading-relaxed">{{ $item["description"] }}</div>
                <div class="">
                    <div class="bg-input-background text-secondary w-fit px-3 py-1 rounded-md">
                        {{ $item["size"] }}
                    </div>
                </div>
                <div>{{ $item["unit"] }}</div>
                <div>{{ $item["price"] }}</div>
                <div>{{ $item["quantity"] }}</div>
            </div>
        @endforeach
    </div>
</div>
