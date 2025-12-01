<div data-create-user-modal-component data-state="open"
    class="fixed inset-0 z-50 data-[state=open]:bg-black/40 data-[state=open]:opacity-100 data-[state=open]:visible invisible group/create-user opacity-0 flex items-center justify-center transition-all duration-200">
    <div data-create-user-modal-content
        class="bg-background p-2 group-data-[state=open]/create-user:translate-y-0 group-data-[state=open]/create-user:scale-100 scale-95 translate-y-2 transition-all duration-200 border min-w-120 rounded-md shadow-[0_0_16px_0_rgba(0,0,0,0.05)]">
        <div class="flex flex-col bg-white rounded-lg shadow-[0_0_8px_0_rgba(0,0,0,0.05)]">
            <div class="border-b px-7 py-5 border">
                <h2 class="text-primary mb-0.5 text-xl">Daftarkan User</h2>
                <p class="text-sm text-secondary">Masukan data untuk menambahkan data user baru</p>
            </div>
            @include('pages.users.create-user-modal.form')
            <div class="px-7 w-full pb-6 mt-6">
                <button data-create-user-modal-submit
                    class="w-full rounded-md shadow-[0_0_8px_0] text-sm bg-accent py-3 px-4 hover:opacity-75 animate-cta text-white">
                    Daftarkan User
                </button>
            </div>
        </div>
    </div>
</div>
