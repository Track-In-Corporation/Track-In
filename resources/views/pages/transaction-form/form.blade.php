<div class="flex md:flex-col gap-0 md:gap-6 justify-between items-center md:items-start p-6">
    <div>
        <h5 class="font-medium text-base">{{ __('messages.transactions.create.information.h4') }}</h5>
        <p class="text-secondary font-regular text-sm mt-0.5">
            {{ __('messages.transactions.create.information.h4_desc') }}</p>
    </div>
    <div class="flex items-end gap-2 h-fit">
        @include('pages.transaction-form.search-bar')
    </div>
</div>
