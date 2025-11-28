<x-dropdown>
    <x-slot name="trigger">
        <iconify-icon class="text-lg text-red" icon="material-symbols:warning-rounded"></iconify-icon>
        <p class="text-sm">Stock Low</p>
    </x-slot>
    <x-slot name="content">
        <div class="p-2 px-4 border-b">
            <p class="text-sm">Filters</p>
        </div>
        <div class="p-1 cursor-pointer">
            <x-dropdown.item id="1" name="slot">
                <iconify-icon class="text-xl text-red" icon="material-symbols:warning-rounded"></iconify-icon>
                <p class="text-sm text-secondary">Stock Low</p>
            </x-dropdown.item>
            <x-dropdown.item id="2" name="slot">
                <iconify-icon class="text-xl text-orange" icon="material-symbols:error"></iconify-icon>
                <p class="text-sm text-secondary">Stock Medium</p>
            </x-dropdown.item>
            <x-dropdown.item id="3" name="slot">
                <iconify-icon class="text-[1.35rem] text-green" icon="lets-icons:check-fill"></iconify-icon>
                <p class="text-sm text-secondary">Stock Ready</p>
            </x-dropdown.item>
        </div>
    </x-slot>
</x-dropdown>
