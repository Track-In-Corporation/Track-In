@extends("layout.index")

@section("content")
    <section class="h-full flex flex-col">
        @include("pages.Inventory.header")
        @include("pages.Inventory.utils")
        @include("pages.Inventory.table")
    </section>
@endsection
