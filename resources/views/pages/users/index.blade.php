@extends('layout.index')

@section('title', __('messages.user.title') . ' - Track-In')

@section('content')
    @include('pages.users.details.index')
    <section class="h-full flex flex-col">
        @include('pages.users.header')
        @include('pages.users.table')
    </section>
@endsection
