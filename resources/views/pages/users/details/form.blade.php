<div data-update-user-form data-user-id="{{ $user->id }}"
    class="mt-8 flex flex-col flex-1 gap-6 px-8 pb-6 md:px-4 md:mt-0 md:border-t md:pt-4">
    @csrf
    <x-input label="{{ __('messages.user.edit.information.usn') }}" placeholder="John Doe" inputClass="rounded-lg! py-3.5!"
        class="mt-0.5" name="name" :value="old('name') ?? $user->name" :error="$errors->first('name')" />
    <x-input label="{{ __('messages.user.edit.information.email') }}" placeholder="Johndoe@gmail.com"
        inputClass="rounded-lg! py-3.5!" class="mt-0.5" name="email" :value="old('email') ?? $user->email" :error="$errors->first('email')" />
    <x-input label="{{ __('messages.user.edit.information.phone') }}" placeholder="032432984"
        inputClass="rounded-lg! py-3.5!" class="mt-0.5" name="phone" :value="old('phone') ?? $user->phone" :error="$errors->first('phone')" />
    @include('pages.users.details.role-selector')
    <div class="flex-1"></div>
    <button data-submit-button
        class="flex items-center gap-2 justify-center bg-accent animate-cta hover:opacity-75 text-white px-5 py-3 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
        <iconify-icon class="text-xl" icon="material-symbols:save-outline"></iconify-icon>
        <p class="text-sm">{{ __('messages.user.edit.information.submit') }}</p>
    </button>
</div>
