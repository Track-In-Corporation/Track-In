<div class="w-full">
    <label class="pb-3 text-primary text-sm font-normal block">
        Profile
    </label>

    <div class="relative z-10 group w-full" data-input-dropdown-component>
        <div class="grid grid-cols-[auto_1fr_auto] w-full py-4 px-4 pr-2 bg-input-background border rounded-sm shadow-soft gap-2 animate-cta hover:border-secondary"
            data-input-dropdown-trigger>
            <div data-input-dropdown-trigger-content class="flex gap-2 items-center text-sm">
                John Doe
            </div>
            <iconify-icon data-input-dropdown-trigger-chevron class="rotate-180 text-lg"
                icon="tabler:chevron-up"></iconify-icon>
        </div>

        <div class="absolute right-0 top-16 border h-fit bg-white shadow-soft rounded-sm 
                   group-data-[state=open]:opacity-100 group-data-[state=open]:visible 
                   group-data-[state=open]:translate-y-0 group-data-[state=open]:scale-100  
                   opacity-0 invisible -translate-y-4 scale-95 transition-all duration-200 p-1 w-40"
            data-input-dropdown-content>
            <a href="/profile"
                class="flex items-center justify-between px-4 py-2 rounded-sm text-sm hover:bg-secondary/5 text-secondary hover:text-primary animate-cta">
                Profile
            </a>

            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 rounded-sm text-sm hover:bg-red-100 text-red-500 hover:text-red-700 w-full text-left">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</div>
