<div data-delete-modal data-state="closed"
    class="data-[state=open]:visible data-[state=open]:opacity-100 opacity-0 group invisible fixed inset-0 bg-black/40 justify-center transition-all duration-200 items-center z-9999 flex min-h-screen ">
    <div class=" bg-[#F9FAFD] p-3 min-w-[600px] rounded-xl max-md:min-w-[250px] group-data-[state=open]:scale-100 group-data-[state=open]:-translate-y-3 scale-95 translate-y-0 transition-all duration-200"
        data-delete-modal-content>
        <div class="bg-white shadow-[0_0_12px_0_rgba(0,0,0,0.1)] border p-3 rounded-xl h-full">
            <div
                class="border-border border-2 border-dashed rounded-xl flex justify-center items-center h-full p-6 flex-col ">
                <div class="rounded-full bg-red/7.5 p-6.5 aspect-square flex items-center justify-center mb-6">
                    <iconify-icon icon="material-symbols:warning-rounded"
                        class="text-red text-6xl max-md:text-4xl"></iconify-icon>
                </div>
                <h1 class="text-2xl max-md:text-xl">{{ __('messages.deleteModal.title') }}</h1>
                <p class="mb-6 text-secondary max-w-[500px] leading-relaxed mt-3 text-center max-md:text-[12px]">
                    {{ __('messages.deleteModal.desc') }}</p>
                <div class="w-full max-md:grid-cols-1  mt-4 grid grid-cols-2 gap-4">
                    <button data-delete-modal-decline
                        class="shadow-soft animate-cta bg-background rounded-lg py-3 px-4 animate-cta hover:opacity-75">
                        {{ __('messages.deleteModal.decline') }}
                    </button>
                    <form data-delete-modal-form method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button data-delete-modal-accept
                            class="animate-cta py-3 px-4 bg-red text-white rounded-lg shadow-[0_0_16px_1px_rgba(255,17,17,0.3)] hover:opacity-75 w-full">{{ __('messages.deleteModal.confirm') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
