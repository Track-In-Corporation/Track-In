@php
    $navigations = [
        [
            'display' => 'Inventory',
            'route' => 'inventory',
            'icon' => 'tabler:box',
        ],
        [
            'display' => 'Transaction',
            'route' => 'transactions',
            'icon' => 'mdi:cart-outline',
        ],
        [
            'display' => 'User',
            'route' => 'users',
            'icon' => 'mdi:user-outline',
        ],
    ];

@endphp
<nav
    class="px-2 navbar relative flex flex-col md:fixed md:bottom-0 md:left-0 md:right-0 md:border-t md:bg-white md:z-100">
    <div class="pt-4 pb-1 md:hidden">
        <div class="flex items-center overflow-hidden rounded-md gap-2 ">
            <img src={{ asset('images/logoTrackIn.png') }} alt="" class="w-10 scale-90">
            {{-- <iconify-icon icon="mingcute:box-line" class="text-2xl p-1.5"></iconify-icon> --}}
            <h2 class="truncate group-data-[navbar-state=closed]:opacity-0 text-lg transition duration-100">Track-In</h2>
        </div>
    </div>
    <div class="w-full h-px bg-border relative md:hidden">
        <div class="-translate-y-1/2 top-1 right-0 translate-x-5 absolute hover:opacity-60 animate-cta navbar__toggle">
            <iconify-icon icon="line-md:chevron-right"
                class="group-data-[navbar-state=open]:rotate-180 animate-cta bg-white text-base text-secondary rounded-full p-1 border shadow-soft"></iconify-icon>
        </div>
    </div>
    <ul class="py-2.5 flex flex-col flex-1 md:flex-row md:justify-between md:py-1">
        @foreach ($navigations as $nav)
            @php
                $isSelected = request()->is($nav['route'] . '*');
                if (Auth::user()->role !== 'admin' && $nav['display'] === 'User') {
                    continue;
                }
            @endphp
            <a @class([
                'flex items-center justify-start gap-2 p-2 overflow-hidden group rounded-md md:shadow-none! md:px-8',
                'bg-white [&>*]:text-accent shadow-soft' => $isSelected,
                'hover:bg-secondary/10 animate-cta' => !$isSelected,
            ]) href={{ route($nav['route']) }}>
                <iconify-icon icon="{{ $nav['icon'] }}" class="text-2xl text-secondary"></iconify-icon>
                <p
                    class="text-secondary text-sm group-data-[navbar-state=closed]:opacity-0 min-w-0 transition-all truncate md:hidden">
                    {{ $nav['display'] }}</p>
            </a>
        @endforeach
        <div class="hidden md:block md:px-8">
            @include('layout.user-dropdown')
        </div>
    </ul>
    <div class="md:hidden mb-2">
        <x-language-switcher></x-language-switcher>
    </div>
    <div class="md:hidden">
        @include('layout.user-dropdown')
    </div>
</nav>
