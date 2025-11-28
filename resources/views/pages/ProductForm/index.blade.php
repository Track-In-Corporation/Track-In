@extends("layout.index")

@section('content')
    @include('pages.ProductForm.Header')
    <div class="grid grid-cols-[4fr_2.25fr] md:grid-cols-1">
        <div class="flex flex-col px-8 py-5 gap-6">
            @include('pages.ProductForm.Left.Identity')
            @include('pages.ProductForm.Left.Specification')
        </div>
        <div class="pr-6 px-0 py-6 flex flex-col gap-6 md:px-8">
            @include('pages.ProductForm.Right.Detail')
        </div>
    </div>
@endsection
