@extends('layout.index')

@section('content')
    @include('pages.transaction-form.header')
    <div class="grid">
        @include('pages.transaction-form.information')
        @include('pages.transaction-form.form')

       <div class="w-full text-sm relative px-6">
            <div class="grid grid-cols-3 gap-6">
                @foreach ($products as $product)
                    @include('pages.transaction-form.card', [
                        'item' => $product,
                        'value' => 0
                    ])
                @endforeach
            </div>
        </div>
    </div>
@endsection
