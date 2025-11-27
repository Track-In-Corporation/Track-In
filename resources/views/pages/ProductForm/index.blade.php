@extends("layout.index")

@section("content")
    <div class="mt-6 flex gap-6 items-center md:flex-col">
        <div
            class="rounded-full bg-tertiary p-3 aspect-square w-fit cursor-pointer hover:bg-secondary/10 transition duration-100">
            <iconify-icon icon="tabler:chevron-left" class="text-2xl" />
        </div>
        <div>
            <h2 class="font-normal text-2xl">Tambahkan Barang
            </h2>
            <p class="text-paragraph font-normal tracking-normal text-sm mt-0.5">
                Masukan data untuk menambahkan barang ke dalam inventaris
            </p>
        </div>
    </div>
@endsection
