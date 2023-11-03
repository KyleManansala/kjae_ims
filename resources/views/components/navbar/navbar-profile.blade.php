<!-- @props([
'align' => 'right'
]) -->

    <div class="relative inline-flex" x-data="{ open: false }">
        <button class="inline-flex justify-center items-center group" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
            <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex items-center truncate">
                <span class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:text-slate-800 dark:group-hover:text-slate-200">{{ Auth::user()->name }}</span>
                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                </svg>
            </div>
        </button>
        <div x-show="open" 
            @click.outside="open = false" 
            @keydown.escape.window="open = false" 
            x-transition:enter="transition ease-out duration-200 transform" 
            x-transition:enter-start="opacity-0 -translate-y-2" 
            x-transition:enter-end="opacity-100 translate-y-0" 
            x-transition:leave="transition ease-out duration-200" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0"
            x-cloak 
            class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'right-0' : 'left-0'}}">

            <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200 dark:border-slate-700">
                <div class="font-medium text-slate-800 dark:text-slate-100">{{ Auth::user()->name }}</div>
            </div>
            <ul>
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3" href="{{ route('logout') }}" @click.prevent="$root.submit();" @focus="open = true" @focusout="open = false">
                            {{ __('Sign Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>





