<div class="mt-3 flex gap-3 justify-between">
    <div class="flex gap-6 ">
        <div class="relative">
            <iconify-icon class="absolute left-3 text-lg text-secondary top-1/2 -translate-y-1/2 "
                icon="material-symbols:search-rounded"></iconify-icon>
            <input type="text"
                class="bg-input-background border rounded-md text-sm pl-9 placeholder:text-tertiary px-3 py-1.5 shadow-soft placeholder:text-sm focus:border-accent focus:outline-1 focus:outline-accent"
                placeholder="Search...">
        </div>
        <div class="w-px h-full bg-border"></div>
        <div class="" data-component-dropdown>
            <div
                class="grid grid-cols-[auto_1fr_auto] w-60 py-1.5 px-3 bg-input-background border rounded-md shadow-soft gap-2">
                <iconify-icon class="text-lg" icon="mynaui:filter"></iconify-icon>
                <div class="flex gap-1">
                    <iconify-icon class="text-lg text-red" icon="material-symbols:warning-rounded"></iconify-icon>
                    <p class="text-sm">Stock Low</p>
                </div>
                <iconify-icon class="rotate-180 text-lg" icon="tabler:chevron-up"></iconify-icon>
            </div>
            <ul></ul>
        </div>
    </div>
    <button
        class="flex items-center gap-2 bg-accent text-white px-5 py-1.5 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
        <iconify-icon class="text-xl" icon="ic:round-plus"></iconify-icon>
        <p class="text-sm">Tambahkan</p>
    </button>
</div>
