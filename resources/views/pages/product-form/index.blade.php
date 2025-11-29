@extends('layout.index')

@section('content')
    @include('pages.product-form.header')
    <form method="POST" action="{{ route('store-product') }}">
        <div class="grid grid-cols-[4fr_2.25fr] md:grid-cols-1">
            @csrf
            <div class="flex flex-col px-8 py-5 gap-6">
                @include('pages.product-form.left.identity')
            @include('pages.product-form.left.specification')
            </div>
            <div class="pr-6 px-0 py-6 flex flex-col gap-6 md:px-8">
                 @include('pages.product-form.right.detail')
            </div>
        </div>
    </form>
    @endphp
@endsection
