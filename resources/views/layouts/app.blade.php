<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="fixed inset-0 font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 overflow-y-hidden"
            x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
            x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
            class="bg-gray-100 dark:bg-gray-900">
            <div :class=" { 'sidebar-expanded lg:ml-20 xl:ml-64': sidebarExpanded, 'lg:ml-20 xl:ml-64': !sidebarExpanded }" class="h-full overflow-y-auto">
                <x-sidebar />
                @include('layouts.navigation')

        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            @if (isset($header))
               
                        {{ $header }}
               
            @endif

            <!-- Page Content -->
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
