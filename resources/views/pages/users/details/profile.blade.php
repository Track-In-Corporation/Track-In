<div class="relative">
    <img class="w-full h-36 object-cover" src={{ asset('images/user-default-banner.png') }} alt="">
    @include('pages.users.details.profile-picture')
</div>
<div class="px-8 mt-20">
    <div>
        <div class="flex items-center gap-6">
            <h2 class=" text-2xl text-primary">{{ $user->name }}</h2>
            <x-user-role-badge variant="{{ $user->role }}"></x-user-role-badge>
        </div>
        <p class="text-secondary mt-0.5">{{ $user->email }}</p>
    </div>
    <div class="mt-7 grid grid-cols-[1fr_auto_1fr_auto_1fr] gap-4 border-b pb-8">
        <div>
            <p class="text-secondary text-sm">{{ __('messages.user.edit.information.date_joined') }}</p>
            <p class="mt-1">{{ $user->created_at->format('d, M Y') }}</p>
        </div>
        <div class="bg-border h-full w-px"></div>
        <div>
            <p class="text-secondary text-sm">{{ __('messages.user.edit.information.last_changed') }}</p>
            <p class="mt-1">{{ $user->updated_at->format('d, M Y') }}</p>
        </div>
        <div class="bg-border h-full w-px"></div>
        <div>
            <p class="text-secondary text-sm">{{ __('messages.user.edit.information.phone') }}</p>
            <p class="mt-1">{{ $user->phone }}</p>
        </div>
    </div>
</div>
