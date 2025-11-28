@props([
    "href" => "#",
    "id" => null,
    "key" => "active",
])

@php
    $href = request()->fullUrlWithQuery([$key => $id]);
    $selected = request()->query($key) === $id;
@endphp

<a data-dropdown-item data-dropdown-id="{{ $id }}" href="{!! $href !!}" @class([
    "flex gap-2 px-2 py-1.5 hover:bg-secondary/5 rounded-md",
    "bg-secondary/5" => $selected,
])>
    {{ $slot }}
</a>
