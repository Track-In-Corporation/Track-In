<div class=" pt-6 px-8 pb-0">
    <h1 class="text-[1.6rem] tracking-tight mb-3">{{ __('messages.user.title') }}</h1>

    <div class="border-t py-4 flex gap-3 justify-between">
        <div class="flex gap-6 h-full">
            <x-search-bar route="{{ route('users') }}"></x-search-bar>
            <div class="w-px bg-border"></div>
            @include('pages.users.filter')
        </div>
    </div>
</div>
