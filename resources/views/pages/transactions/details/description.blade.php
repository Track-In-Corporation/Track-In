@php
    $general = [
        [
            'icon' => 'material-symbols:date-range',
            'title' => 'Tanggal Dibuat',
            'value' => $transaction->created_at,
        ],
        ['icon' => 'mdi:user-outline', 'title' => 'Nama', 'value' => $transaction->recipient_name],
        ['icon' => 'tabler:address-book', 'title' => 'Alamat', 'value' => $transaction->recipient_address],
    ];
@endphp
<div class="flex flex-col gap-4 my-6 mb-3 border-b pb-6">
    @foreach ($general as $item)
        <div class="grid grid-cols-[8.5rem_1fr] gap-3">
            <div class="flex gap-3">
                <iconify-icon icon="{{ $item['icon'] }}" class="text-secondary text-xl"></iconify-icon>
                <p class="text-secondary text-sm">{{ $item['title'] }}</p>
            </div>
            <p class="text-sm leading-[180%]">{{ $item['value'] }}</p>
        </div>
    @endforeach
</div>
