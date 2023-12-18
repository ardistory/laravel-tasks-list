<div x-data="{ open: false }">
    <div
        class="bg-black mx-auto px-14 py-3 text-zinc-400 flex items-center justify-between font-semibold border-b-zinc-900 border-b-[3px] md:border-b-[1px] mb-4 ">
        <a href="/">
            <div class="flex items-center gap-1">
                <div class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                </div>
                <p class="text-white font-bold text-2xl italic">ardiStory</p>
            </div>
        </a>
        <div x-on:click="open = !open" class="md:hidden scale-150 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path :class="{ 'hidden': open == false }" stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
                <path :class="{ 'hidden': open == true }" stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
        <div class="hidden md:flex">
            <ul class="flex gap-6 mr-5 text-zinc-500">
                <a href="/">
                    <div
                        class="{{ request()->is('/') ? 'bg-white text-black' : '' }} hover:text-white py-1 px-2 rounded-full flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <li>
                            Home
                        </li>
                    </div>
                </a>
                <a href="/about">
                    <div
                        class="{{ request()->is('about') ? 'bg-white text-black' : '' }} hover:text-white py-1 px-2 rounded-full flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <li>
                            About
                        </li>
                    </div>
                </a>
                <a href="/profile">
                    <div
                        class="{{ request()->is('profile') ? 'bg-white text-black' : '' }} hover:text-white py-1 px-2 rounded-full flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <li>
                            Profile
                        </li>
                    </div>
                </a>
            </ul>
        </div>
    </div>
    <div x-show="open" class="absolute bg-black w-full h-4/5 top-14 z-10">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3 w-full text-zinc-500">
            <a href="/"
                class="{{ request()->is('/') ? 'bg-white text-black' : '' }} hover:bg-white hover:text-black block rounded-md px-3 py-2 text-base font-medium"
                aria-current="page">Home</a>
            <a href="/about"
                class="{{ request()->is('about') ? 'bg-white text-black' : '' }} hover:bg-white hover:text-black block rounded-md px-3 py-2 text-base font-medium">About</a>
            <a href="/profile"
                class="{{ request()->is('profile') ? 'bg-white text-black' : '' }} hover:bg-white hover:text-black block rounded-md px-3 py-2 text-base font-medium">Profile</a>
        </div>
    </div>
</div>
