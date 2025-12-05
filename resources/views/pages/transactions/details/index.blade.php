<x-window width="50rem" key="id" name="transaction">
    <div class="px-7 py-2.5 border-b flex gap-3 items-center">
        <iconify-icon icon="material-symbols:close-rounded" data-window-close
            class="text-lg text-secondary hover:opacity-50 animate-cta"></iconify-icon>
        <p class="">{{ __('messages.transactions.detail.title') }}</p>
    </div>
    <div class="p-7 pt-0 pb-0 overflow-y-auto flex-1 flex flex-col" data-transaction-detail-container></div>
</x-window>
