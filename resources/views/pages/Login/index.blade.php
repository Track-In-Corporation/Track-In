@extends('layout.auth-layout')

@section('title', __('messages.login.title') . ' - Track-In')

@section('content')


    <div class="flex justify-between flex-col h-full">
        <div class="justify-between flex items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logoTrackIn.png') }}" alt="">
                <h1 class="text-xl">Track-In</h1>
            </div>

            <x-language-switcher />
        </div>

        <form method="POST" action="/login"
            class="flex flex-col w-full px-8 mx-auto justify-center max-md:px-0 max-md:w-full py-16 ">
            @csrf
            <p class="text-4xl font-medium tracking-tight">{{ __('messages.login.header') }}</p>
            <p class="mt-1.5 leading-relaxed text-secondary">{{ __('messages.login.header_desc') }}</p>
            <x-input label="{{ __('messages.login.input.email') }}" placeholder="elysiabellamy@gmail.com"
                class="mt-8 mb-6  w-full" name="email" :value="old('email')" :error="$errors->first('email')" />
            <x-input label="{{ __('messages.login.input.pass') }}" placeholder="********" class="mt-1 w-full" name="pass"
                :value="old('pass')" :error="$errors->first('pass')" type="password" />

            <div class="flex items-center gap-2 my-4">
                <input type="checkbox" class="w-5 h-5 rounded-lg bg-input-background border-border!" name="rememberMe"
                    id="rememberMe">
                <label for="rememberMe" class="text-sm">{{ __('messages.login.input.remember_me') }}</label>
            </div>

            <button type="submit"
                class="bg-accent mt-6 w-full rounded-xl text-white py-4 animate-cta">{{ __('messages.login.input.submit') }}</button>
            {{-- <p class="text-secondary my-8 text-center">{{ __('messages.login.input.has_acc') }} <a href="/register"><span
                        class="text-accent underline">{{ __('messages.login.input.login') }}</span></a></p> --}}
        </form>

        <p class="text-sm text-center text-tertiary mb-2">{{ __('messages.login.footer') }}</p>
    </div>

    <div class="w-full flex justify-center items-center lg:hidden">
        <img class="object-cover h-full" src="{{ asset('images/authIllust.png') }}" alt="">
    </div>
@endsection
