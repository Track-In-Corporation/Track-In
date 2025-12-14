<div class=" pt-6 px-8 pb-0 md:px-0 md:pt-4">
    <h1 class="text-[1.6rem] tracking-tight mb-3 md:px-6">{{ __('messages.user.title') }}</h1>

    <div class=" py-4 flex gap-3 justify-between md:px-4 md:flex-col md:pb-4 md:mb-1 border-t">
        <div class="flex gap-6 h-full md:pb-4 md:mb-1 md:border-b">
            <x-search-bar route="{{ route('users') }}" class="w-full"></x-search-bar>
            <div class="w-px bg-border md:hidden"></div>
            @include('pages.users.filter')
        </div>
        <button data-create-user-button
            class="flex items-center gap-2 bg-accent text-white px-5 py-1.5 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
            <iconify-icon class="text-xl" icon="ic:round-plus"></iconify-icon>
            <p class="text-sm">{{ __('messages.utils.add') }}</p>
        </button>
        @include('pages.users.create-user-modal.index')
    </div>
</div>
