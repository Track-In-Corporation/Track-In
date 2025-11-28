@extends('layout.index')
@php
    $inventoryTypes = [
        'Butuh Lartas' => 'icon-park-outline:ad-product',
        'Butuh SNI'    => 'solar:flame-bold',
    ];

    $selected = old('type');
@endphp

@section('content')
  <div class="min-h-screen flex justify-center items-center">
      <img src="{{asset('images/juun21.jpg')}}" alt="">
      <button class="sideModalInventoryButton">Open Modal</button>


      <!-- Side Modal -->
      <div data-sideModalInventory-state='open' class="fixed inset-0 h-screen bg-black/40 sideModalInventory opacity-0 transition-opacity duration-200 pointer-events-none">
        <!-- Content -->
         <!-- Change This! -->
         <div class=" absolute sideModalInventoryContent bg-background p-3 my-4 right-4  max-w-[800px] h-full max-h-[97vh] rounded-xl max-md:min-w-[250px] z-10  transform  transition-transform duration-200 translate-x-full max-md:max-w-[400px] max-md:right-0  max-md:overflow-y-scroll">
            <div class="bg-white rounded-xl h-full ">

            <div class="animate-cta p-3 flex justify-start items-center gap-2 backButtonInventory">
              <iconify-icon icon="ep:arrow-left" ></iconify-icon>
              <p class="">Detil Transaksi</p>
            </div>

            <div class="bg-gray-300 w-full h-px opacity-50"></div>
            
            <div class="p-5">
              <div class="flex justify-between items-center">
                <div class="fji gap-2">
                  <iconify-icon icon="material-symbols:error-outline-rounded" class="text-2xl text-secondary max-md:text-base" ></iconify-icon>
                  <p class="font-semibold text-2xl">MOO97</p>
                  <div class="px-3 py-1 rounded-lg fji border-2 border-border gap-2">
                    <div class="rounded-full w-2 h-2 bg-green"></div>
                    <p class="">Material</p>
                  </div>
                </div>

                <button class="shadow-soft px-4 bg-accent py-2 max-md:gap-1 max-md:px-2 max-md:py-1 rounded-lg fji gap-2 animate-cta">
                  <iconify-icon icon="mingcute:truck-line" class="text-white text-xl max-md:text-base" ></iconify-icon>
                  <p class="text-white max-md:text-[10px]">Ubah Detail</p>
                </button>
              </div>

              <!-- Tabel -->
               <div class="border-2 border-background rounded-xl my-3">
                  <p class="p-3 w-full bg-background">Komersial</p>
                  <div class="grid grid-cols-3">
                    <!-- Harga Barang -->
                    <div class=" p-6 my-3 border-r-2 border-background">
                      <div class="fji gap-1">
                        <iconify-icon icon="icomoon-free:price-tag" class="text-tertiary text-lg max-md:text-base" ></iconify-icon>
                        <p class="text-secondary  text-lg">Harga Barang</p>
                      </div>
                      <p class="text-xl text-center ">Rp. 150.000</p>
                    </div>

                    <!-- Satuaan -->
                    <div class=" p-6 my-3 border-r-2 border-background">
                      <div class="fji gap-1">
                        <iconify-icon icon="icomoon-free:price-tag" class="text-tertiary text-lg max-md:text-base" ></iconify-icon>
                        <p class="text-secondary  text-lg">Satuan</p>
                      </div>
                      <p class="text-xl text-center ">67 PCS</p>
                    </div>

                    <!-- Stok Barang -->
                    <div class=" p-6 my-3  border-background">
                      <div class="fji gap-1">
                        <iconify-icon icon="icomoon-free:price-tag" class="text-tertiary text-lg max-md:text-base" ></iconify-icon>
                        <p class="text-secondary  text-lg">Stok Barang</p>
                      </div>
                      <p class="text-xl text-center ">400</p>
                    </div>
                  </div>
               </div>

              <!-- Detail Produk -->

              <div>
                <p class="font-bold">Detil Produk</p>
                <p class="text-secondary">Data -data terkait produk</p>

                <div class="bg-gray-300 w-full h-0.5 my-3 opacity-50"></div>

                <div class="grid grid-cols-3 max-md:grid-cols-2 gap-3 ">
                  <!-- Deskripsi -->
                  <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                    <iconify-icon icon="charm:container" class="text-secondary text-xl" ></iconify-icon>
                    <p class="text-secondary">Deskripsi</p>
                  </div>
                  <div class="col-span-2 max-md:col-span-1 my-2 max-w-[300px]">KARBON STEEL KAYU KAYU KAYU KAYU KAYU</div>

                  <!-- Ukuran -->
                  <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                    <iconify-icon icon="radix-icons:size" class="text-secondary text-xl" ></iconify-icon>
                    <p class="text-secondary">Ukuran</p>
                  </div>
                  <div class="col-span-2 max-md:col-span-1 my-2 bg-red/10 px-3 py-1 rounded-lg w-max">8"</div>

                  <!-- HS CODE  -->
                  <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                    <iconify-icon icon="nimbus:barcode" class="text-secondary text-xl" ></iconify-icon>
                    <p class="text-secondary">HS Code</p>
                  </div>
                  <div class="col-span-2 max-md:col-span-1 my-2">73212323</div>

                  <!-- HS CODE  -->
                  <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                    <iconify-icon icon="akar-icons:location" class="text-secondary text-xl" ></iconify-icon>
                    <p class="text-secondary">Negara Asal</p>
                  </div>
                  <div class="col-span-2 max-md:col-span-1 my-2">Korea</div>

                  <!-- SCH  -->
                  <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                    <iconify-icon icon="charm:container" class="text-secondary text-xl" ></iconify-icon>
                    <p class="text-secondary">SCH</p>
                  </div>
                  <div class="col-span-2 max-md:col-span-1 my-2">40S</div>
                </div>


                <div class="mt-4">
                    <input type="hidden" name="type" id="type-input" value="{{ $selected }}">

                    <ul id="type-selector" class="border bg-background rounded-md grid grid-cols-2 p-4 gap-3 shadow-soft">

                      @foreach ($inventoryTypes as $label => $icon)
                          @php $isSelected = $selected === $label; @endphp
                          
                          <li 
                              class="type-option flex items-center gap-2 bg-white px-3 py-2 rounded-sm border shadow-soft transition cursor-pointer
                                    {{ $isSelected ? 'selected-type' : 'hover:border-accent/50' }}"
                              data-type="{{ $label }}"
                          >
                              <div class="p-1.5 rounded-full bg-accent/5 w-10 h-10 flex items-center justify-center">
                                  <iconify-icon icon="{{ $icon }}" width="20" height="20" class="text-accent"></iconify-icon>
                              </div>

                              <p class="font-medium text-sm">{{ $label }}</p>

                              <span class="selected-badge text-white bg-accent rounded-full px-2 text-xs ml-auto transition
                                  {{ $isSelected ? 'opacity-100' : 'opacity-0' }}">
                                  Terpilih
                              </span>
                          </li>
                      @endforeach

                    </ul>
                </div>
              </div>

              <div class="bg-gray-300 w-full h-px my-3 opacity-50"></div>

              <!-- Spesifikasi Material-->
               <div class="grid grid-cols-3 max-md:grid-cols-2 gap-3 ">
                <!-- Kategori Ukuran -->
                 <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                  <iconify-icon icon="charm:container" class="text-secondary text-xl" ></iconify-icon>
                  <p class="text-secondary">Kategori Ukuran </p>
                </div>
                <div class="col-span-2 max-md:col-span-1 my-2">>16CM</div>

                <!-- Nama -->
                 <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                  <iconify-icon icon="charm:container" class="text-secondary text-xl" ></iconify-icon>
                  <p class="text-secondary">Nama</p>
                </div>
                <div class="col-span-2 max-md:col-span-1 my-2">Carbon Steel</div>

                <!-- Alamat  -->
                 <div class="col-span-1 flex justify-start items-center gap-1 my-2">
                  <iconify-icon icon="charm:container" class="text-secondary text-xl" ></iconify-icon>
                  <p class="text-secondary">Material Type</p>
                </div>
                <div class="col-span-2 max-md:col-span-1 my-2">Fitting</div>
              </div>

            </div>
          </div>
         </div>
         <!-- Change This! -->
      </div>
  </div>
@endsection

<script>
document.querySelectorAll(".type-option").forEach(option => {
    option.addEventListener("click", () => {
        const selectedType = option.dataset.type;

        // set input value
        document.getElementById("type-input").value = selectedType;

        // remove selection from all
        document.querySelectorAll(".type-option").forEach(el => {
            el.classList.remove("selected-type");
            el.querySelector(".selected-badge").classList.replace("opacity-100", "opacity-0");
        });

        // add selection to clicked
        option.classList.add("selected-type");
        option.querySelector(".selected-badge").classList.replace("opacity-0", "opacity-100");
    });
});
</script>