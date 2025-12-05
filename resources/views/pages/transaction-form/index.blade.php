@extends('layout.index')

@section('title', __('messages.transactions.create.title') . ' - Track-In')

@section('content')
    <form method="POST" action="{{ $isEdit ? route('update.transaction', $transaction->id) : route('create.transaction') }}">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif
        @include('pages.transaction-form.header')
        <div class="grid">
            @include('pages.transaction-form.information')
            @include('pages.transaction-form.form')

            <div class="w-full text-sm relative px-6">
                <div class="grid md:grid-cols-1 lg:grid-cols-2 grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        @include('pages.transaction-form.card', [
                            'item' => $product,
                            'value' => $selectedItems[$product->code] ?? 0,
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection
