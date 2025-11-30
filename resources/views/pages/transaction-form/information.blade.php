<div class="px-6 pt-6 pb-8 border-b left-0 right-0 top-0 ">
    <h4 class="text-lg font-semibold">Informasi Transaksi</h4>
    <div class="grid grid-cols-2 gap-8">
        <div class="flex flex-col gap-5 mt-7.5">
            <x-input
                label="Nama Perusahaan"
                placeholder="PT. Inti Karya Persada Tehnik Wisma IKPT"
                class="mt-0.5"
                name="recipient_name"
                :value="old('recipient_name')"
                :error="$errors->first('recipient_name')"
            />
            <x-input
                label="Alamat Perusahaan"
                placeholder="Jakarta, Indonesia"
                class="mt-0.5"
                name="recipient_address"
                :value="old('recipient_address')"
                :error="$errors->first('recipient_address')"
            />
        </div>
        <div>
          <h5 class="font-medium text-base">Jenis Produk</h5>
          <p class="text-secondary font-regular text-sm mt-0.5">
            Beberapa produk memiliki detail pengisian data yang berbeda
          </p>
          @include('components.type-selector', ['error' => $errors->first('type')])
        </div>
    </div>
 </div>
