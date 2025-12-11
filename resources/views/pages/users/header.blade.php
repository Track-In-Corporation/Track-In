<div class=" pt-6 px-8 pb-0 md:px-0 md:pt-4">
    <h1 class="text-[1.6rem] tracking-tight mb-3 md:px-6">{{ __('messages.user.title') }}</h1>

    <div class="border-t py-4 flex gap-3 justify-between md:px-4 md:flex-col md:pb-4 md:mb-1">
        <div class="flex gap-6 h-full md:pb-4 md:mb-1 md:border-b">
            <x-search-bar route="{{ route('users') }}" class="w-full"></x-search-bar>
            <div class="w-px bg-border md:hidden"></div>
        </div>
        @include('pages.users.filter')
    </div>
</div>
