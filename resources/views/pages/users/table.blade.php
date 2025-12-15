@php
    $items = [
        ['key' => __('messages.user.col.user_info'), 'size' => 'minmax(20rem,1fr)'],
        ['key' => __('messages.user.col.user_role'), 'size' => 'minmax(20rem,auto)'],
        ['key' => __('messages.user.col.user_last_update'), 'size' => 'minmax(12rem,auto)'],
    ];
    $gridColumnSizes = array_reduce($items, function ($acc, $item) {
        return $acc . ' ' . $item['size'];
    });
    $users->appends(request()->query());
@endphp

<div class="flex-1 relative">
    <div class="absolute inset-0  overflow-auto">
        <div class="relative flex flex-col h-full">
            <div class="grid [&>div]:border-r [&>div]:px-4 [&>div]:py-3 [&>div]:bg-input-background sticky top-0 left-0 right-0 [&>div]:border-y"
                style="grid-template-columns: {{ $gridColumnSizes }};">
                @foreach ($items as $item)
                    <div class="text-sm">{!! $item['key'] !!}</div>
                @endforeach
            </div>
            @if (count($users) == 0)
                <div class="flex p-4 flex-1 h-full flex-col items-center justify-center">
                    <div
                        class="flex w-full h-full rounded-md flex-col items-center justify-center border-2 border-dashed">
                        <iconify-icon icon="material-symbols:error-outline"
                            class="text-[5rem] mb-4 text-secondary"></iconify-icon>
                        <p class="text-2xl font-medium">{{ __('messages.error_message.user_not_found') }}</p>
                        <p class="text-secondary mt-1">{{ __('messages.error_message.user_not_found_desc') }}</p>
                    </div>
                </div>
            @endif
            @foreach ($users as $user)
                <div data-window-trigger="{{ $user->id }}"
                    class="grid [&>div]:items-center [&>div]:flex [&>div]:text-sm [&>div]:px-4 [&>div]:py-3 [&>div]:border-b hover:bg-secondary/5 animate-cta"
                    style="grid-template-columns: {{ $gridColumnSizes }};">
                    <div class="flex items-center gap-4 truncate">
                        @if ($user->profile_picture_path)
                            <img src="{{ $user->profile_picture_path }}"
                                class="w-10 aspect-square bg-background rounded-full object-cover"></img>
                        @else
                            <div class="w-10 aspect-square bg-background rounded-full"></div>
                        @endif
                        <div class="truncate">
                            <p class="text-primary truncate">{{ $user['name'] }}</p>
                            <p class="text-sm text-secondary truncate">{{ $user['email'] }}</p>
                        </div>
                    </div>
                    <div>
                        <x-user-role-badge variant="{{ $user['role'] }}"></x-user-role-badge>
                    </div>
                    <div>{{ $user['formatted_created_at'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="flex border-t px-5 py-2 items-center gap-4">
    <div class="flex gap-4 items-center">
        <a class="hover:bg-secondary/10 animate-cta border -rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $users->previousPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
        <div class="text-sm text-secondary tracking-wide">Page <span
                class="text-primary">{{ $users->currentPage() }}</span> of
            {{ $users->lastPage() }}</div>
        <a class="hover:bg-secondary/10 animate-cta border rotate-90 text-lg w-7.5 h-7.5 flex items-center justify-center rounded-md bg-white text-secondary shadow-soft"
            href={{ $users->nextPageUrl() }}>
            <iconify-icon icon="solar:arrow-up-linear" class="text-primary"></iconify-icon>
        </a>
    </div>
</div>
