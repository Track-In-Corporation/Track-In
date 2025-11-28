<div class="flex gap-3 justify-between px-8">
    <div class="flex gap-6">
        <x-search-bar></x-search-bar>
        <div class="w-px h-full bg-border"></div>
        @include("pages.inventory.filter")
    </div>
    <a href={{ route('add-form') }} class="flex items-center gap-2 bg-accent text-white px-5 py-1.5 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
        <iconify-icon class="text-xl" icon="ic:round-plus"></iconify-icon>
        <p class="text-sm">Tambahkan</p>
    </a>
</div>
