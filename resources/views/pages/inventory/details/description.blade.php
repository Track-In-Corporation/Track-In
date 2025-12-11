@php
    $general = [
        [
            'icon' => 'material-symbols:description-outline',
            'title' => __('messages.inventory.detail.product_desc'),
            'value' => $product->description,
        ],
        ['icon' => 'radix-icons:size', 'title' => __('messages.inventory.detail.size'), 'value' => $product->size],
        ['icon' => 'nimbus:barcode', 'title' => __('messages.inventory.detail.hs_code'), 'value' => $product->hs_code],
        [
            'icon' => 'akar-icons:location',
            'title' => __('messages.inventory.detail.origin'),
            'value' => $product->country_origin,
        ],
        ['icon' => 'charm:container', 'title' => __('messages.inventory.detail.sch'), 'value' => $product->sch],
        [
            'icon' => 'gg:list',
            'title' => __('messages.inventory.detail.material_family'),
            'value' => $product->material_family,
        ],
    ];
@endphp
<div class="mt-5">
    <div class="pb-5 border-b">
        <h2 class="text-lg  font-medium mb-0.5">{{ __('messages.inventory.detail.title') }}</h2>
        <p class="text-sm text-secondary">{{ __('messages.inventory.detail.desc') }}</p>
    </div>
    <div class="py-6 flex flex-col gap-4">
        @foreach ($general as $item)
            <div @class([
                'grid grid-cols-[8.5rem_1fr] gap-3 md:items-center',
                'md:grid-cols-1 not-last:md:border-b md:pb-4' =>
                    $item['title'] == __('messages.inventory.detail.product_desc'),
            ])>
                <div class="flex gap-3">
                    <iconify-icon icon="{{ $item['icon'] }}" class="text-secondary text-xl"></iconify-icon>
                    <p class="text-secondary text-sm">{{ $item['title'] }}</p>
                </div>
                <p class="text-sm leading-[180%]">{{ $item['value'] }}</p>
            </div>
        @endforeach
        <div class="grid grid-cols-2 gap-4 mt-1">
            <div @class([
                'flex items-center justify-between border px-4 py-2.5 rounded-md shadow-soft',
                'border-accent' => $product->lartas_required,
            ])>
                <div class="flex items-center gap-2">
                    <iconify-icon class="text-2xl text-primary" icon="mingcute:paper-line"></iconify-icon>
                    <p class="text-primary text-sm">{{ __('messages.inventory.detail.need_lartas') }}</p>
                </div>
                <div class="rounded-full border p-1.5">
                    <div @class([
                        'bg-tetiary w-2.5 h-2.5 rounded-full',
                        'bg-accent' => $product->lartas_required,
                    ])></div>
                </div>
            </div>
            <div @class([
                'flex items-center justify-between border px-4 py-2.5 rounded-md shadow-soft',
                'border-accent' => $product->sni_required,
            ])>
                <div class="flex items-center gap-2">
                    <iconify-icon class="text-2xl text-primary" icon="charm:notes-tick"></iconify-icon>
                    <p class="text-primary text-sm">{{ __('messages.inventory.detail.need_sni') }}</p>
                </div>
                <div class="rounded-full border p-1.5">
                    <div @class([
                        'bg-tetiary w-2.5 h-2.5 rounded-full',
                        'bg-accent' => $product->sni_required,
                    ])></div>
                </div>
            </div>
        </div>
    </div>
</div>
