<div class="w-full max-w-xl mb-4 md:mb-0">
    <h1 class="text-2xl font-semibold flex gap-1 items-center">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>
        </div>
        Edit Task
    </h1>
    <div class="border border-r-white/50 border-b-white/50 p-4 rounded-xl flex flex-col gap-1">
        <form method="post" class="gap-1 flex items-center" autocomplete="off">
            @csrf
            <input type="text" name="task" class="outline-none text-black px-2 py-1 rounded-md w-full"
                value="{{ $targol }}">
            <button
                class="border border-white rounded-md active:ring-2 active:ring-teal-300 inline-flex gap-1 hover:bg-slate-900 px-2 py-1">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
                Save
            </button>
        </form>
    </div>
</div>
