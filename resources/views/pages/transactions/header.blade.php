<div class=" pt-6 px-8 pb-0">
    <h1 class="text-[1.6rem] tracking-tight mb-3">{{ __('messages.transactions.title') }}</h1>

    <div class="border-t py-4 flex gap-3 justify-between">
        <div class="flex gap-6 h-full">
            <x-search-bar route="{{ route('transactions') }}"></x-search-bar>
            <div class="w-px bg-border"></div>
            @include('pages.transactions.filter')
        </div>
        <a href={{ route('transaction-form') }}
            class="flex items-center gap-2 bg-accent text-white px-5 py-1.5 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
            <iconify-icon class="text-xl" icon="ic:round-plus"></iconify-icon>
            <p class="text-sm">{{ __('messages.utils.add') }}</p>
        </a>
    </div>
</div>
