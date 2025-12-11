 <div class="relative z-20 group" data-profile-popup-component data-state="closed">

     {{-- Trigger Button --}}
     <div class="mb-3 md:mb-0 flex gap-2 items-center cursor-pointer
               group-data-[navbar-state=open]:hover:bg-secondary/10
               group-data-[navbar-state=closed]:hover:opacity-75
               animate-cta p-1 rounded-lg"
         data-profile-popup-trigger>
         <img class="rounded-full md:w-8 max-w-10 max-h-10 w-full min-w-9 transition-all aspect-square border-white border"
             src="{{ Auth::user()->profile_picture_path ?? 'https://static.vecteezy.com/system/resources/thumbnails/022/014/184/small/user-icon-member-login-isolated-vector.jpg' }}"
             alt="User Avatar">

         <div class="group-data-[navbar-state=closed]:opacity-0 transition duration-100 md:hidden">
             <p class="text-sm text-primary">{{ Auth::user()->name }}</p>
             <p class="text-xs text-secondary">{{ Auth::user()->email }}</p>
         </div>
     </div>

     {{-- Popup Dropdown --}}
     <div class="absolute left-0 md:right-0 md:left-auto bottom-full mb-2 border bg-white shadow-soft rounded-lg w-72
        invisible -translate-y-2 scale-95 transition-all duration-200 opacity-0
                    group-data-[state=open]:opacity-100 group-data-[state=open]:visible
                    group-data-[state=open]:translate-y-0 group-data-[state=open]:scale-100
        z-9999 p-1  "
         data-profile-popup-content>
         <div class="px-4 py-1 pb-3 border-b">
             <div class="text-base text-primary mb-.5">{{ Auth::user()->name }}</div>
             <p class="text-sm text-secondary">{{ Auth::user()->email }}</p>
         </div>
         <div class="py-2 px-2 border-b">
             <x-language-switcher></x-language-switcher>
         </div>
         <form method="POST" action="/logout" class="p-1">
             @csrf
             <button type="submit"
                 class="w-full px-3 py-2 text-sm text-left flex items-center gap-2 animate-cta hover:bg-input-background rounded-md">
                 <iconify-icon icon="material-symbols:logout-rounded" class="text-lg"></iconify-icon>
                 Log Out
             </button>
         </form>
     </div>
 </div>
