<div class="px-7 py-4">
    <div class="grid grid-cols-2 gap-6 w-full mb-6">
        <x-input label="Username" placeholder="John Doe" inputClass="w-full rounded-lg! py-3.5!" class="mt-0.5"
            name="name" :value="old('name')" :error="$errors->first('name')" />
        <x-input label="Email" placeholder="Johndoe@gmail.com" inputClass="rounded-lg! py-3.5!" class="mt-0.5"
            name="email" :value="old('email')" :error="$errors->first('email')" />
    </div>
    <div class="pb-6 border-b">
        <x-input label="Phone" placeholder="032432984" inputClass="rounded-lg! py-3.5!" class="mt-0.5" name="phone"
            :value="old('phone')" :error="$errors->first('phone')" />
    </div>
    <div class="mt-6">
        <x-role-selector value="user"></x-role-selector>
    </div>
</div>
