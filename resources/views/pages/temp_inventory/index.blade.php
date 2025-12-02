@extends('layout.index')

@section('content')
    @include('pages.inventory.details.index')
    <section class="h-full flex flex-col">
        @include('pages.inventory.header')
        @include('pages.inventory.utils')
        @include('pages.inventory.table')
    </section>
@endsection
