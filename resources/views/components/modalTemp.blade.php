@extends('layout.index')

@section('content')
  <div class="min-h-screen flex justify-center items-center">
      <img src="{{asset('images/juun21.jpg')}}" alt="">
      <button class="modalButton">Open Modal</button>

      <!-- Modal -->
      <div class="fixed inset-0 bg-black/40 modal flex justify-center items-center">
        <!-- Content -->
         <!-- Change This! -->
         <div class=" content bg-border p-3 mx-auto  min-w-[600px] h-[400px] rounded-xl max-md:min-w-[250px]">
            <div class="bg-white p-3 rounded-xl h-full">
              <div class="border-border border-2 border-dashed rounded-xl flex justify-center items-center h-full  p-3 flex-col ">
                <div class="rounded-full bg-red/10 px-4 py-3">
                  <iconify-icon icon="material-symbols:warning-rounded" class="text-red text-6xl max-md:text-4xl"></iconify-icon>
                </div>
                <h1 class="mt-2 text-2xl max-md:text-xl">Apakah Anda Yakin?</h1>
                <p class="text-secondary max-w-[500px] mt-3 text-center max-md:text-[12px]">Apakah anda yakin ingin menghapus data ini? Tindakan ini bersifat permanen dan tidak dapat dipulihkan.</p>
                <div class="w-full max-md:grid-cols-1  my-4 grid grid-cols-2 gap-2">
                  <button class="cancelButton animate-cta bg-background rounded-xl py-4 px-4">
                      Tidak, Batalkan
                  </button>

                  <button class="successButton animate-cta py-4 px-4 bg-red text-white rounded-xl">Ya, Saya Yakin</button>
                </div>
              </div>
            </div>
         </div>
         <!-- Change This! -->
      </div>
  </div>
@endsection