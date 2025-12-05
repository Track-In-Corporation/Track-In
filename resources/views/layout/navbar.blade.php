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

                if (Auth::user()->role !== 'admin' && $nav['display'] === 'User') {
                    continue;
                }
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

    <x-language-switcher />
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">logout</button>
    </form>

    <div class="relative z-20" data-profile-popup-component>

        {{-- Trigger Button --}}
        <div class="mb-3 flex gap-2 items-center cursor-pointer 
               group-data-[navbar-state=open]:hover:bg-secondary/10 
               group-data-[navbar-state=closed]:hover:opacity-75 
               animate-cta p-1 rounded-lg"
            data-profile-popup-trigger>
            <img class="rounded-full max-w-10 max-h-10 w-full min-w-9 transition-all aspect-square border-white border"
                src="https://images.unsplash.com/profile-1619559142670-fcd58dab16a9image?w=150&dpr=2&crop=faces&bg=%23fff&h=150&auto=format&fit=crop&q=60&ixlib=rb-4.1.0"
                alt="User Avatar">

            <div class="group-data-[navbar-state=closed]:opacity-0 transition duration-100">
                <p class="text-sm text-primary">John Doe</p>
                <p class="text-xs text-secondary">Johndoe@mail.com</p>
            </div>
        </div>

        {{-- Popup Dropdown --}}
        <div class="absolute right-0 top-14 border bg-white shadow-soft rounded-lg w-44 overflow-hidden
               group-data-[state=open]:opacity-100 group-data-[state=open]:visible
               group-data-[state=open]:translate-y-0 group-data-[state=open]:scale-100
               opacity-0 invisible -translate-y-4 scale-95 transition-all duration-200"
            data-profile-popup-content>
            <a href="/profile" class="block px-4 py-2 text-sm hover:bg-secondary/10 text-primary">
                Profile
            </a>

            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="block w-full px-4 py-2 text-sm text-left text-red-500 hover:bg-red-100 hover:text-red-700">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>
