@extends('layout.index')

@section('content')
    <div class="flex-col">
        @include('pages.ProductForm.Header')
        <div class="px-5 py-3">
            @include('pages.ProductForm.TypeSelector')
        </div>
    </div>
@endsection
