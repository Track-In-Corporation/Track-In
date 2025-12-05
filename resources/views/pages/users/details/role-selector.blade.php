@php
    $value = old('role') ?? $user->role;
@endphp
<div data-user-role-selector>
    <p class="mb-2 text-primary text-sm">{{ __('messages.user.col.user_role') }}</p>
    <div class="grid grid-cols-2 gap-6">
        <div data-option="user" data-state="{{ $value == 'user' ? 'active' : 'inactive' }}"
            class="group flex items-center justify-between hover:border-secondary  animate-cta border shadow-soft px-4 py-3 rounded-md data-[state=active]:border-accent data-[state=active]:outline-accent data-[state=active]:outline">
            <x-user-role-badge variant="user"></x-user-role-badge>
            <div class="rounded-full p-1.5 border shadow-soft">
                <div class="w-2.25 h-2.25 bg-border group-data-[state=active]:bg-accent  rounded-full"></div>
            </div>
        </div>
        <div data-option="admin" data-state="{{ $value == 'admin' ? 'active' : 'inactive' }}"
            class="group flex items-center justify-between hover:border-secondary animate-cta border shadow-soft px-4 py-3 rounded-md data-[state=active]:border-accent data-[state=active]:outline-accent data-[state=active]:outline">
            <x-user-role-badge variant="admin"></x-user-role-badge>
            <div class="rounded-full p-1.5 border shadow-soft">
                <div class="w-2.25 h-2.25 bg-border group-data-[state=active]:bg-accent  rounded-full"></div>
            </div>
        </div>
    </div>
    <input data-input type="hidden" value="{{ $value }}" name="role">
</div>
