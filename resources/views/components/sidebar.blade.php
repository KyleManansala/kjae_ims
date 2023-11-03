

    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 lg:hidden lg:z-auto transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar" class="flex flex-col absolute z-50 left-0 inset-y-0 lg:translate-x-0 h-auto bg-gray-950 overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 xl:!w-64 shrink-0 p-4 transition-all duration-200 ease-in-out" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false, sidebarExpanded = false" @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-50 hover:text-slate-50" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
        </div>

        <!-- Links -->
        <div class="space-y-8">


            <!-- Pages group -->
            <div>

                <ul class="mt-3">

                    <!-- Dashboard -->
                    @php
                    $dashboardActive = in_array(Request::segment(1), ['dashboard']);
                    @endphp
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 {{ $dashboardActive ? 'bg-slate-800' : '' }}" x-data="{ open: {{ $dashboardActive ? 1 : 0 }} }">
                        <a class="block text-white hover:text-slate-200 transition duration-150 truncate @if(Route::is('dashboard')){{ 'text-white' }}@endif" href="{{ route('dashboard') }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>

                                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="mt-3">

                    <!-- Inventory -->
                    @php
                    $inventoryActive = in_array(Request::segment(1), ['inventory']);
                    @endphp
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 {{ $inventoryActive ? 'bg-slate-800' : '' }}" x-data="{ open: {{ $inventoryActive ? 1 : 0 }} }">
                        <a class="block text-white hover:text-slate-200 transition duration-150 truncate @if(Route::is('inventory.index')){{ 'text-white' }}@endif" href="{{ route('inventory.index') }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>

                                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">Inventory</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="mt-3">
                    <!-- Category -->
                    @php
                    $categoryActive = in_array(Request::segment(1), ['category']);
                    @endphp
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 {{ $categoryActive ? 'bg-slate-800' : '' }}" x-data="{ open: {{ $categoryActive ? 1 : 0 }} }">
                        <a class="block text-white hover:text-slate-200 transition duration-150 truncate @if(Route::is('category.index')){{ 'text-white' }}@endif" href="{{ route('category.index') }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                    </svg>


                                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">Categories</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>



                <ul class="mt-3">
                    <!-- Reports -->
                    @php
                    $reportsActive = in_array(Request::segment(1), ['reports']);
                    @endphp
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 {{ $reportsActive ? 'bg-slate-800' : '' }}" x-data="{ open: {{ $reportsActive ? 1 : 0 }} }">
                        <a class="block text-white hover:text-slate-200 transition duration-150 truncate @if(Route::is('weather')){{ 'text-white' }}@endif" href="{{ route('reports') }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                                        <line x1="18" y1="20" x2="18" y2="10"></line>
                                        <line x1="12" y1="20" x2="12" y2="4"></line>
                                        <line x1="6" y1="20" x2="6" y2="14"></line>
                                    </svg>

                                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">Reports</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                
                <ul class="mt-3">
                    <!-- Tips -->
                    @php
                    $tipsActive = in_array(Request::segment(1), ['tips']);
                    @endphp
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 {{ $tipsActive ? 'bg-slate-800' : '' }}" x-data="{ open: {{ $tipsActive ? 1 : 0 }} }">
                        <a class="block text-white hover:text-slate-200 transition duration-150 truncate @if(Route::is('tips')){{ 'text-white' }}@endif" href="{{ route('tips') }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>

                                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">Tips</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="mt-3">
                    <!-- Weather -->
                    @php
                    $weatherActive = in_array(Request::segment(1), ['weather']);
                    @endphp
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 {{ $weatherActive ? 'bg-slate-800' : '' }}" x-data="{ open: {{ $weatherActive ? 1 : 0 }} }">
                        <a class="block text-white hover:text-slate-200 transition duration-150 truncate @if(Route::is('weather')){{ 'text-white' }}@endif" href="{{ route('weather') }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z" />
                                    </svg>

                                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">Weather</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>





            </div>





            <!-- Expand / collapse button -->
            <div class="pt-3 hidden lg:inline-flex xl:hidden justify-end mt-auto">
                <div class="px-3 py-2">
                    <button @click.stop="sidebarExpanded = !sidebarExpanded" aria-controls="sidebar" :aria-expanded="sidebarExpanded">
                        <span class="sr-only">Expand / collapse sidebar</span>
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                            <path class="text-slate-600" d="M3 23H1V1h2z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
