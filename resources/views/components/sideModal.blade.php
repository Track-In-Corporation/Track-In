@extends('layout.index')

@section('content')
  <div class="min-h-screen flex justify-center items-center">
      <img src="{{asset('images/juun21.jpg')}}" alt="">
      <button class="modalButton">Open Modal</button>


      <!-- Side Modal -->
      <div data-navbar-state='open' class="fixed inset-0 h-screen bg-black/40 modal">
        <!-- Content -->
         <!-- Change This! -->
         <div class=" absolute content bg-border p-3 my-4 right-4  min-w-[600px] h-full max-h-[97vh] rounded-xl max-md:min-w-[250px]">
            <div class="bg-white rounded-xl h-full">

            <div class="p-3 flex justify-start items-center gap-3">
              <iconify-icon icon="ep:arrow-left" ></iconify-icon>
              <p class="">Detil Transaksi</p>
            </div>

            <div class="bg-gray-300 w-full h-px"></div>
            
            <div class="p-3">
              <div class="flex justify-between items-center">
                <div class="fji gap-2">
                  <p class="font-semibold">Order001</p>
                  <p class="px-3 py-1 bg-background">Pending</p>
                </div>

                <button class=" px-4">
                  <iconify-icon icon="mingcute:truck-line" ></iconify-icon>
                  <p class="text-white">Buat Surat Jalan</p>
                </button>
              </div>
            </div>
          </div>
         </div>
         <!-- Change This! -->
      </div>
  </div>
@endsection