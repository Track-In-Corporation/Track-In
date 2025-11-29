@extends('layout.index')

@section('content')
    @include('pages.transactions.details.index')
    <section class="h-full flex flex-col">
        @include('pages.transactions.header')
        @include('pages.transactions.table')
    </section>
@endsection
