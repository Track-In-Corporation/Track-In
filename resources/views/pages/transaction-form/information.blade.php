<div class="px-6 pt-6 pb-8 border-b left-0 right-0 top-0 ">
    <h4 class="text-lg font-semibold">{{ __('messages.transactions.create.information.h2') }}</h4>
    <div class="grid grid-cols-2 lg:grid-cols-1 gap-8">
        <div class="flex flex-col gap-5 mt-7.5">
            <x-input label="{{ __('messages.transactions.create.information.input.company_name') }}"
                placeholder="PT. Inti Karya Persada Tehnik Wisma IKPT" class="mt-0.5" name="recipient_name"
                :value="old('recipient_name', $transaction->recipient_name ?? '')" :error="$errors->first('recipient_name')" />
            <x-input label="{{ __('messages.transactions.create.information.input.company_address') }}"
                placeholder="Jakarta, Indonesia" class="mt-0.5" name="recipient_address" :value="old('recipient_address', $transaction->recipient_address ?? '')"
                :error="$errors->first('recipient_address')" />
        </div>
        <div>
            <h5 class="font-medium text-base">{{ __('messages.transactions.create.information.h3') }}</h5>
            <p class="text-secondary font-regular text-sm mt-0.5">
                {{ __('messages.transactions.create.information.h3_desc') }}
            </p>
            @include('components.type-selector', [
                'error' => $errors->first('type'),
                'useQueryRedirect' => true,
            ])
        </div>
    </div>
</div>
