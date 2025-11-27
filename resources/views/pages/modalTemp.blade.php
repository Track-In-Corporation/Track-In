@extends('layout.index')

@section('content')
  <div class="min-h-screen flex justify-center items-center">
      <img src="{{asset('images/juun21.jpg')}}" alt="">
      <button class="modalButton">Open Modal</button>


      <!-- Modal -->
      <div class="fixed inset-0 bg-black/40 modal flex justify-center items-center">
        <!-- Content -->
         <!-- Change This! -->
         <div class=" bg-border p-3 mx-auto  min-w-[600px] min-h-[400px] rounded-xl">
            <div class="bg-background p-3 rounded-xl">
              <div class="border-border border-2 border-dashed rounded-xl flex justify-center items-center p-3 flex-col">
                  <iconify-icon icon="material-symbols:warning-rounded" class="text-red text-3xl"></iconify-icon>
                  <h1>Apakah Anda Yakin?</h1>
                  <p>Apakah anda yakin ingin menghapus data ini? Tindakan ini bersifat permanen dan tidak dapat dipulihkan.</p>
              </div>
            </div>
         </div>
         <!-- Change This! -->
      </div>
  </div>
@endsection