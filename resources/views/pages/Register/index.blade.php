@extends('layout.auth-layout')

@section('title', __('messages.register.title') . ' - Track-In')

@section('content')


    <div class="flex justify-between flex-col lg:min-h-220 ">
        <div class="justify-between flex items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logoTrackIn.png') }}" alt="">
                <h1 class="text-xl">Track-In</h1>
            </div>

            <x-language-switcher />
        </div>

        <form method="POST" action="{{ route('create.user') }}"
            class="flex flex-col w-full px-8 mx-auto justify-center max-md:px-0 max-md:w-full py-16 ">
            @csrf
            <p class="text-4xl font-medium tracking-tight">{{ __('messages.register.header') }}</p>
            <p class="mt-2 leading-relaxed mb-6 text-secondary">{{ __('messages.register.header_desc') }}</p>

            <x-input label="{{ __('messages.register.input.full_name') }}" placeholder="Elysia Bellamy"
                class="mt-1 w-full mb-6" name="fullName" :value="old('fullName')" :error="$errors->first('fullName')" />
            <x-input label="{{ __('messages.register.input.email') }}" placeholder="elysiabellamy@gmail.com"
                class="mt-1 w-full mb-6" name="email" :value="old('email')" :error="$errors->first('email')" />
            <x-input label="{{ __('messages.register.input.pass') }}" placeholder="********" class="mt-1 w-full mb-4"
                name="pass" :value="old('pass')" :error="$errors->first('pass')" type="password" />

            <div class="flex items-center gap-2 mb-10">
                <input type="checkbox" class="w-5 h-5 rounded-lg bg-input-background border-border!" name="rememberMe"
                    id="rememberMe">
                <label for="rememberMe" class="text-sm">{{ __('messages.register.input.remember_me') }}</label>
            </div>

            <button type="submit"
                class="bg-accent w-full rounded-xl text-white py-4 animate-cta">{{ __('messages.register.input.submit') }}</button>


            <p class="text-secondary my-8 text-center">{{ __('messages.register.input.has_acc') }} <a href="/login"><span
                        class="text-accent underline">{{ __('messages.register.input.login') }}</span></a></p>
        </form>

        <p class="text-center text-tertiary text-sm mb-2">{{ __('messages.register.footer') }}</p>
    </div>

    <div class="w-full flex justify-center items-center lg:hidden">

        <img class="max-h-full bg-cover" src="{{ asset('images/authIllust.png') }}" alt="">
    </div>


@endsection
