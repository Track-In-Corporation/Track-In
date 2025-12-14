<div data-profile-picture-input class="absolute bottom-0 left-8 md:left-4 translate-y-1/2 w-32 h-32">
    <div class="relative  border-6 border-white rounded-full group/profile h-full w-full">
        <input type="file" class="fixed -z-100 opacity-0">
        <iconify-icon icon="tabler:camera"
            class="absolute left-1/2 top-1/2 -translate-x-1/2 animate-cta z-20 -translate-y-1/2 group-hover/profile:opacity-100 opacity-0 text-white text-3xl"></iconify-icon>
        <div
            class="bg-black/50 rounded-full absolute z-10 inset-0 group-hover/profile:opacity-50 backdrop-blur-lg animate-cta opacity-0 flex items-center justify-center">
        </div>
        <img @if ($user->profile_picture_path) src={{ $user->profile_picture_path }} @endif
            class="h-full w-full rounded-full object-cover bg-border" />
    </div>
</div>
