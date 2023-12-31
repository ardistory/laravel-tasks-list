<div class="w-full max-w-xl mb-4">
    <h1 class="text-2xl font-semibold flex gap-1 items-center">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
            </svg>
        </div>
        Task List
    </h1>
    <div class="mb-4">
        <form method="post" class="gap-1 flex items-center" autocomplete="off">
            @csrf
            <input type="text" name="task" placeholder="Add Task"
                class="outline-none text-black px-2 py-1 rounded-md w-full">
            <button
                class="border border-white rounded-md active:ring-2 active:ring-teal-300 inline-flex hover:bg-slate-900 px-2 py-1">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
            </button>
        </form>
        @if (session('edited'))
            <p class="text-indigo-400 font-semibold text-xs">{{ session('edited') }}</p>
        @endif
        @if (session('success'))
            <p class="text-teal-400 font-semibold text-xs">{{ session('success') }}</p>
        @endif
        @if (session('deleted'))
            <p class="text-red-400 font-semibold text-xs">{{ session('deleted') }}</p>
        @endif
        @if (session('error'))
            <p class="text-red-400 font-semibold text-xs">{{ session('error') }}</p>
        @endif
        @if (session('checked'))
            <p class="text-indigo-500 font-semibold text-xs">{{ session('checked') }}</p>
        @endif
        @if (session('unchecked'))
            <p class="text-rose-500 font-semibold text-xs">{{ session('unchecked') }}</p>
        @endif
    </div>
    @if (count($tasks) == 0)
        <div class="px-4 py-2 border border-r-white/50 border-b-white/50 p-4 rounded-xl flex gap-1 justify-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
            </div>
            <p>No Data</p>
        </div>
    @endif
    @if (count($tasks) > 0)
        <div class="border border-r-white/50 border-b-white/50 p-4 rounded-xl flex flex-col gap-1">
            @foreach ($tasks as $task)
                <div class="px-4 py-2 flex justify-between items-center rounded">
                    <div class="mt-1 flex items-center gap-x-1.5">
                        <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                            <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="text-sm text-white">{{ $task->list }}</p>
                        @if ($task->mark == true)
                            <div class="scale-75">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex gap-1">
                        <form action="/edit" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <button class="active:ring bg-white text-black font-semibold px-2 rounded-md inline-flex">
                                <div class="text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </div>
                                Edit
                            </button>
                        </form>
                        <form action="/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <button class="active:ring active:ring-red-500 border border-white px-2 rounded-md flex">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                Delete
                            </button>
                        </form>
                        <form action="{{ $task->mark == true ? '/unchecked' : '/checked' }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <button class="hover:text-white/90">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        @if ($task->mark == true)
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                clip-rule="evenodd" />
                                        @else
                                            <path fill-rule="evenodd"
                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                clip-rule="evenodd" />
                                        @endif
                                    </svg>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
