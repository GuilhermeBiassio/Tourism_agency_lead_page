<!-- Sidenav -->
<nav id="sidenav-5"
    class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] bg-zinc-800 xl:data-[te-sidenav-hidden='false']:translate-x-0"
    data-te-sidenav-init data-te-sidenav-hidden="true" data-te-sidenav-mode-breakpoint-over="0"
    data-te-sidenav-mode-breakpoint-side="xl" data-te-sidenav-content="#content" data-te-sidenav-accordion="true">
    <div class="flex justify-end p-2">
        <button data-te-sidenav-toggle-ref data-te-target="#sidenav-5" aria-controls="#sidenav-5" aria-haspopup="true">
            <span class="block [&>svg]:h-8 [&>svg]:w-8 [&>svg]:text-white hover:[&>svg]:text-[#ddd]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </span>
        </button>
    </div>
    <span class="text-white font-bold m-[10px]">Menu</span>
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        <li class="relative">
            <a href="{{ route('admin.index') }}"
                class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-white outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="font-bold">Dashboard</span>
            </a>
        </li>
        <li class="relative">
            <a href="{{ route('background.index') }}"
                class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-white outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="font-bold">Background</span>
            </a>
        </li>
        @if (Auth::user()->is_admin)
            <li class="relative">
                <a href="{{ route('profile.index') }}"
                    class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-white outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                    data-te-sidenav-link-ref>
                    <span class="font-bold">Usuários</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
<!-- Sidenav -->
