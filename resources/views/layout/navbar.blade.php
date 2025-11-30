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
        // [
        //     'display' => 'User',
        //     'route' => 'users',
        //     'icon' => 'mdi:user-outline',
        // ],
    ];
@endphp
<nav class="px-2 navbar relative flex flex-col">
    <div class="pt-4 pb-1">
        <div class="flex items-center overflow-hidden rounded-md gap-0 ">
            <iconify-icon icon="mingcute:box-line" class="text-2xl p-1.5"></iconify-icon>
            <h2 class="truncate group-data-[navbar-state=closed]:opacity-0 transition duration-100">TRACK IN</h2>
        </div>
    </div>
    <div class="w-full h-px bg-border relative">
        <div class="-translate-y-1/2 top-1 right-0 translate-x-5 absolute hover:opacity-60 animate-cta navbar__toggle">
            <iconify-icon icon="line-md:chevron-right"
                class="group-data-[navbar-state=open]:rotate-180 animate-cta bg-white text-base text-secondary rounded-full p-1 border shadow-soft"></iconify-icon>
        </div>
    </div>
    <ul class="py-2.5 flex flex-col flex-1">
        @foreach ($navigations as $nav)
            @php
                $isSelected = request()->is($nav['route'] . '*');
            @endphp
            <a @class([
                'flex items-center justify-start gap-2 p-2 overflow-hidden group rounded-md',
                'bg-white [&>*]:text-accent shadow-soft' => $isSelected,
                'hover:bg-secondary/10 animate-cta' => !$isSelected,
            ]) href={{ route($nav['route']) }}>
                <iconify-icon icon="{{ $nav['icon'] }}" class="text-2xl text-secondary"></iconify-icon>
                <p
                    class="text-secondary text-sm group-data-[navbar-state=closed]:opacity-0 min-w-0 transition-all truncate">
                    {{ $nav['display'] }}</p>
            </a>
        @endforeach
    </ul>
    <div
        class="mb-3 flex gap-2 items-center group-data-[navbar-state=open]:hover:bg-secondary/10 group-data-[navbar-state=closed]:hover:opacity-75 animate-cta p-1 rounded-lg">
        <img class="rounded-full max-w-10 max-h-10 w-full min-w-9 transition-all aspect-square border-white border"
            src="https://images.unsplash.com/profile-1619559142670-fcd58dab16a9image?w=150&dpr=2&crop=faces&bg=%23fff&h=150&auto=format&fit=crop&q=60&ixlib=rb-4.1.0"
            alt="">
        <div class="group-data-[navbar-state=closed]:opacity-0 transition duration-100">
            <p class="text-sm text-primary">John Doe</p>
            <p class="text-xs text-secondary">Johndoe@mail.com</p>
        </div>
    </div>
</nav>
