<!-- @props([
'align' => 'right'
]) -->

    <div class="relative inline-flex" x-data="{ open: false }">
        
        {{-- <!-- Notification bell -->
        <button class="ml-2 mr-4 inline-flex justify-center items-center group" aria-label="Notifications" @click.prevent="openNotifications()">
                <!-- Bell icon -->
                <svg class="w-6 h-6 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
        </button> --}}
        <!-- Your existing content -->

        <!-- Notification bell -->
<div class="relative inline-flex" x-data="{ showNotifications: false }" @click.away="showNotifications = false">
    <button class="ml-2 mr-4 inline-flex justify-center items-center group relative" aria-label="Notifications" x-on:click="showNotifications = !showNotifications">
        <svg class="w-6 h-6 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-red-500"></div>
    </button>

    <!-- Content -->
    <div x-show="showNotifications" id="notificationDropdown" class="absolute mt-10 bg-white shadow-md">
        <div class="pt-2 px-3 text-sm">
            <p class="font-medium">Products with zero stocks:</p>
            <ul>
                {{-- @if($productsWithZeroQuantity->count() > 0)
                    @foreach($productsWithZeroQuantity as $inventory)
                        <li>{{ $inventory->product_name }}</li>
                    @endforeach
                @else
                    <li>No products have zero stocks.</li>
                @endif --}}
            </ul>
        </div>
    </div>
</div>


        <!-- Profile icon -->
        <button class="inline-flex justify-center items-center group" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
            <div class="w-8 h-8 rounded-full bg-white text-slate-700 border-slate-900 flex items-center justify-center">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex items-center truncate">
                <span class="truncate ml-2 text-sm font-medium dark:text-white group-hover:text-slate-600 dark:group-hover:text-slate-600">{{ Auth::user()->name }}</span>
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
                <x-dropdown-link class="text-white hover:text-black"  :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <a class="font-medium text-sm text-red-500 hover:text-indigo-600 dark:hover:text-red-400 flex items-center py-1 px-3" href="{{ route('logout') }}" @click.prevent="$root.submit();" @focus="open = true" @focusout="open = false">
                            {{ __('Sign Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        <script>
            // For controlling the notification dropdown visibility
            function openNotifications() {
                const dropdown = document.getElementById('notificationDropdown');
                dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            }
        
            // For controlling the click outside the container
            window.addEventListener('click', function(event) {
                const notificationContainer = document.getElementById('notificationContainer');
                const notificationDropdown = document.getElementById('notificationDropdown');
        
                if (event.target !== notificationContainer && !notificationContainer.contains(event.target)) {
                    notificationDropdown.style.display = 'none';
                }
            });
        </script>
    </div>





