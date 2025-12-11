<div class="flex gap-3 justify-between md:flex-col px-8 md:px-4">
    <div class="flex gap-6 h-full md:flex-col md:gap-2 md:border-b md:pb-2 md:mb-2">
        <x-search-bar class="w-full" route="{{ route('inventory') }}"></x-search-bar>
        <div class="bg-border self-stretch h-full w-px"></div>
    </div>
    <div class="w-full flex justify-between items-center gap-4">
        @include('pages.inventory.filter')
        @auth
            @if (Auth::user()->role === 'admin')
                <a href={{ route('product-form') }}
                    class="flex items-center gap-2 bg-accent text-white px-5 py-1.5 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
                    <iconify-icon class="text-xl" icon="ic:round-plus"></iconify-icon>
                    <p class="text-sm">{{ __('messages.utils.add') }}</p>
                </a>
            @endif
        @endauth
    </div>
</div>
