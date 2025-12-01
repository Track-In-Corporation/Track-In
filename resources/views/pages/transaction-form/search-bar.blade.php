<div class="flex gap-3 items-center h-full">
    <input type="text" name="search"
        class="bg-input-background border rounded-md text-sm placeholder:text-tertiary px-3 py-1.5 shadow-soft placeholder:text-sm focus:border-accent focus:outline-1 focus:outline-accent hover:border-secondary"
        placeholder="Search..." value="{{ old('search') ?? request('search') }}" />
    <button type="submit" name="mode" value="search"
        class="relative border p-1.5 h-full bg-input-background animate-cta hover:opacity-75 hover:border-secondary shadow-soft aspect-square rounded-md flex items-center justify-center">
        <iconify-icon class="text-xl text-primary" icon="material-symbols:search-rounded"></iconify-icon>
    </button>
</div>
