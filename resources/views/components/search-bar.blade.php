@props([
    'route' => null,
    'type' => null,
])

<form method="GET" action="{{ $route }}" class="flex gap-3 items-center h-full">
    {{-- Preserve existing query params --}}
    @foreach (request()->except(['search', 'page']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

    <input type="text" name="search"
        class="bg-input-background border rounded-md text-sm placeholder:text-tertiary px-3 py-1.5 shadow-soft placeholder:text-sm focus:border-accent focus:outline-1 focus:outline-accent hover:border-secondary"
        placeholder="{{ __('messages.utils.search') }}" value="{{ request()->query('search') }}" />
    <button @if ($type) type="{{ $type }}" @endif
        class="relative border p-1.5 h-full bg-input-background animate-cta hover:opacity-75 hover:border-secondary shadow-soft aspect-square rounded-md flex items-center justify-center">
        <iconify-icon class="text-xl text-primary" icon="material-symbols:search-rounded"></iconify-icon>
    </button>
</form>
