@php
    $tabs = [
        [
            'type' => 'materials',
            'display' => __('messages.inventory.category.material'),
            'icon' => 'icon-park-outline:ad-product',
        ],
        [
            'type' => 'chemicals',
            'display' => __('messages.inventory.category.chemicals'),
            'icon' => 'solar:flame-bold',
        ],
        [
            'type' => 'raw-parts',
            'display' => __('messages.inventory.category.raw_parts'),
            'icon' => 'ri:wrench-line',
        ],
        [
            'type' => 'consumables',
            'display' => __('messages.inventory.category.consumables'),
            'icon' => 'mingcute:paper-line',
        ],
    ];
@endphp
<div class=" pt-6 px-8 pb-4 md:px-0 md:pt-4 ">
    <h1 class="text-[1.6rem] tracking-tight mb-6 md:px-6">{{ __('messages.inventory.title') }}</h1>
    <div class="relative h-8 ">
        <div class="flex absolute left-0 right-0 overflow-y-auto gap-4 items-center border-b md:px-4">
            @foreach ($tabs as $tab)
                @php
                    $isSelected = request()->query('type') === $tab['type'];

                    // Merge with the current query to retain previous states
                    $href = route(
                        'inventory',
                        array_merge(request()->query(), ['type' => $tab['type'], 'page' => null]),
                    );
                @endphp

                <a @class([
                    'flex gap-3 items-center text-secondary relative pb-3 px-4',
                    'hover:opacity-50 animate-cta' => !$isSelected,
                ]) href={{ $href }}>
                    <iconify-icon @class(['text-xl', 'text-primary' => $isSelected]) icon={{ $tab['icon'] }}></iconify-icon>
                    <div @class(['text-sm whitespace-nowrap', 'text-primary' => $isSelected])>{{ $tab['display'] }}</div>
                    <div @class([
                        'bg-accent h-[3px] w-full absolute bottom-0 left-0 right-0 opacity-0',
                        'opacity-100' => $isSelected,
                    ])></div>
                </a>
            @endforeach
        </div>
    </div>

</div>
