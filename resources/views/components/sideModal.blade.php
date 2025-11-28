@extends('layout.index')

@section('content')
  <div class="min-h-screen flex justify-center items-center">
      <img src="{{asset('images/juun21.jpg')}}" alt="">
      <button class="sideModalButton">Open Modal</button>


      <!-- Side Modal -->
      <div data-sideModalTransaction-state='open' class="fixed inset-0 h-screen bg-black/40 sideModalTransaction opacity-100 transition-opacity duration-200 pointer-events-none">
        <!-- Content -->
         <!-- Change This! -->
         <div class=" absolute sideModalTransactionContent bg-border p-3 my-4 right-4  max-w-[800px] h-full max-h-[97vh] rounded-xl max-md:min-w-[250px] z-10  transform  transition-transform duration-200 ">
            <div class="bg-white rounded-xl h-full">

            <div class="animate-cta p-3 flex justify-start items-center gap-2">
              <iconify-icon icon="ep:arrow-left" ></iconify-icon>
              <p class="">Detil Transaksi</p>
            </div>

            <div class="bg-gray-300 w-full h-px"></div>
            
            <div class="p-5">
              <div class="flex justify-between items-center">
                <div class="fji gap-2">
                  <p class="font-semibold text-2xl">Order001</p>
                  <p class="px-3 py-1 bg-background rounded-full">Pending</p>
                </div>

                <button class="shadow-soft px-4 bg-accent py-2 rounded-lg fji gap-2 animate-cta">
                  <iconify-icon icon="mingcute:truck-line" class="text-white text-xl " ></iconify-icon>
                  <p class="text-white">Buat Surat Jalan</p>
                </button>
              </div>

              <div class="bg-gray-300 w-full h-px my-3"></div>

              <!-- Detail Transaksi -->
              <div class="grid grid-cols-3 gap-3">
                <!-- No Transaksi -->
                <div class="col-span-1 flex justify-start items-center gap-1">
                  <iconify-icon icon="mingcute:paper-line" class="text-secondary text-xl" ></iconify-icon>
                  <p class="text-secondary">No. Transaksi</p>
                </div>
                <div class="col-span-2 py-2 px-4 rounded-full bg-border w-max text-secondary">KOMARISAMA</div>

                <!-- Tanggal Dibuat -->
                 <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                  <iconify-icon icon="material-symbols:date-range" class="text-secondary text-xl" ></iconify-icon>
                  <p class="text-secondary">Tanggal Dibuat</p>
                </div>
                <div class="col-span-2 my-2">KOMARISAMA</div>

                <!-- Nama -->
                 <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                  <iconify-icon icon="mdi:user-outline" class="text-secondary text-xl" ></iconify-icon>
                  <p class="text-secondary">Nama</p>
                </div>
                <div class="col-span-2 my-2">KOMARISAMA</div>

                <!-- Alamat  -->
                 <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                  <iconify-icon icon="tabler:address-book" class="text-secondary text-xl" ></iconify-icon>
                  <p class="text-secondary">Alamat</p>
                </div>
                <div class="col-span-2 my-2">KOMARISAMA</div>
              </div>

              <div class="bg-gray-300 w-full h-px my-3"></div>

              <!-- Detil Produk -->

              <!-- Rincian Harga -->
               <div class="rounded-xl border-t-10 border-t-accent border-border p-6 border">
                  <div class="grid grid-cols-2 justify-between">
                    <div >
                      <div class="flex justify-start items-center gap-1">
                        <iconify-icon icon="humbleicons:money" class="text-2xl font-bold"></iconify-icon>
                        <p class="font-bold text-xl">Rincian Harga</p>
                      </div>
                      <p class="text-secondary">Perhitungan dari rincian barang yang dipilih untuk transaksi.</p>
                    </div>

                    <div class="flex justify-between items-end w-full flex-col content-end">
                      <div class="w-[300px] ">
                        <!-- Subtotal -->
                        <div class="flex justify-between items-center w-full">
                          <p class="text-lg text-secondary">Subtotal</p>
                          <p class="text-lg">Rp. 16.000.000</p>  
                        </div>

                        <div class="bg-gray-300 w-full h-0.5 my-2"></div>
                        
                        <!-- NETTO -->
                        <div class="flex justify-between items-center w-full">
                          <p class="text-lg text-secondary">Subtotal</p>
                          <p class="text-lg">Rp. 16.000.000</p>  
                        </div>

                        <div class="bg-gray-300 w-full h-0.5 my-2"></div>
                        
                        <!-- PPN -->
                        <div class="flex justify-between items-center w-full">
                          <p class="text-lg text-secondary">Subtotal</p>
                          <p class="text-lg">Rp. 16.000.000</p>  
                        </div>

                        <div class="bg-gray-300 w-full h-0.5 my-2"></div>
                          
                        <!-- TOTAL -->
                        <div class="flex justify-between items-center w-full my-1">
                          <p class=" text-black font-bold text-xl">Total</p>
                          <p class="text-xl">Rp. 16.000.000</p>  
                        </div>

                        
                        
                      </div>
                    </div>
                  </div>
               </div>

            </div>
          </div>
         </div>
         <!-- Change This! -->
      </div>
  </div>
@endsection