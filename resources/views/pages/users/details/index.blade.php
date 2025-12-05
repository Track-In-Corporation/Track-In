<x-window width="40rem" key="id" name="users">
    <div class="px-7 py-2.5 border-b flex gap-3 items-center">
        <iconify-icon icon="material-symbols:close-rounded" data-window-close
            class="text-lg text-secondary hover:opacity-50 animate-cta"></iconify-icon>
        <p class="">{{ __('messages.user.edit.title') }}</p>
    </div>
    <div class="overflow-y-auto flex-1 flex flex-col" data-users-detail-container></div>
</x-window>
