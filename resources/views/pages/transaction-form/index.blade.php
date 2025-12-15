@extends('layout.index')

@section('title', __('messages.transactions.create.title') . ' - Track-In')

@section('content')
    <form transaction-form-submit method="POST" class="h-full flex flex-col"
        action="{{ $isEdit ? route('update.transaction', $transaction->id) : route('create.transaction') }}">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif
        @include('pages.transaction-form.header')
        <div class="h-full flex-1 flex-col flex">
            @include('pages.transaction-form.information')
            @include('pages.transaction-form.form')

            <div class="w-full text-sm relative px-6 flex-1">
                <div class="grid md:grid-cols-1! lg:grid-cols-2 grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        @php
                            $code = $product->code;

                        @endphp
                        @include('pages.transaction-form.card', [
                            'item' => $product,
                            'value' => $selectedItems[$product->code] ?? 0,
                        ])
                    @endforeach
                </div>
                @if (count($products) == 0)
                    <div class="flex flex-1 h-full flex-col items-center justify-center">
                        <div
                            class="flex w-full h-full rounded-md flex-col items-center justify-center border-2 border-dashed">
                            <iconify-icon icon="material-symbols:error-outline"
                                class="text-[5rem] mb-4 text-secondary"></iconify-icon>
                            <p class="text-2xl font-medium">{{ __('messages.error_message.product_not_found') }}</p>
                            <p class="text-secondary mt-1">{{ __('messages.error_message.product_not_found_desc') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
