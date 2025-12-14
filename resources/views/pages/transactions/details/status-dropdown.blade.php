@php
    $items = [
        'pending' => [
            'title' => __('messages.status-dropdown.pending.title'),
            'description' => __('messages.status-dropdown.pending.description'),
            'styles' => 'text-primary',
        ],
        'on-delivery' => [
            'title' => __('messages.status-dropdown.on-delivery.title'),
            'description' => __('messages.status-dropdown.on-delivery.description'),
            'styles' => 'text-[#3034FE]',
        ],
        'waiting-payment' => [
            'title' => __('messages.status-dropdown.waiting-payment.title'),
            'description' => __('messages.status-dropdown.waiting-payment.description'),
            'styles' => 'text-[#DD4C76]',
        ],
        'completed' => [
            'title' => __('messages.status-dropdown.completed.title'),
            'description' => __('messages.status-dropdown.completed.description'),
            'styles' => 'text-[#38A897]',
        ],
    ];
@endphp

<div class="relative group" data-status-dropdown data-state="closed">
    <div data-trigger class="flex items-center gap-2 hover:opacity-50 animate-cta select-none">
        <x-status-badge variant="{{ $transaction->status }}"></x-status-badge>
        <iconify-icon icon="lucide:chevron-down" class="text-xl"></iconify-icon>
    </div>
    <div data-content
        class="bg-white border w-96 rounded-md shadow-soft absolute left-0 right-0 top-8 z-50 group-data-[state=open]:opacity-100 group-data-[state=open]:scale-100 group-data-[state=open]:visible group-data-[state=open]:translate-y-0 opacity-0 scale-98 invisible -translate-y-2 transition-all duration-200">
        <div class="py-2 px-4 border-b text-sm">
            {{ __('messages.status-dropdown.title') }}
        </div>
        <form class="p-1" method="POST" action={{ route('transaction-status-edit', $transaction->id) }}>
            @csrf
            @foreach ($items as $status => $detail)
                @php
                    $selected = $status === $transaction->status;
                @endphp
                <button type="submit" value="{{ $status }}" name="status" @class([
                    'text-start w-full px-4 py-2 hover:bg-secondary/5 animate-cta block rounded-md',
                    'bg-secondary/5' => $selected,
                ])>
                    <h4 @class([$detail['styles'], 'text-sm'])>{{ $detail['title'] }}</h4>
                    <p class="text-secondary text-sm">{{ $detail['description'] }}</p>
                </button>
            @endforeach
        </form>
    </div>
</div>
