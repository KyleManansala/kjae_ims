<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KJAE IMS</title>
    <!-- Tailwind  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <div class="flex flex-wrap">
        <div class="w-full sm:w-8/12 mb-10">
            <div class="container mx-auto h-full sm:p-10">
                <nav class="flex px-4 justify-between items-center">
                    <div class="text-4xl font-bold">
                        KJAE IMS<span class="text-green-700">.</span>
                    </div>
                    <div>
                        <img src="https://image.flaticon.com/icons/svg/497/497348.svg" alt="" class="w-8">
                    </div>
                </nav>
                <header class="container px-4 lg:flex mt-10 items-center h-full lg:mt-0">
                    <div class="w-full">
                        <h1 class="text-4xl lg:text-6xl font-bold">Welcome<span class="text-green-700"> to</span>
                            KJAE IMS</h1>
                        <div class="w-20 h-2 bg-green-700 my-4"></div>
                        <p class="text-xl mb-10"> Where precision meets efficiency in managing your farming and poultry supplies.</p>
                        @if (Route::has('login'))

                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="bg-green-500 text-white text-2xl font-medium px-4 py-2 rounded shadow">Go Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-green-500 text-white text-2xl font-medium px-4 py-2 rounded shadow">Log in Now!</a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</a>
                                @endif --}}
                            @endauth

                        @endif
                    </div>
                </header>
            </div>
        </div>
        <img src="https://images.unsplash.com/photo-1621460249485-4e4f92c9de5d?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Leafs" class="w-full h-48 object-cover sm:h-screen sm:w-4/12">
    </div>

</body>


</html>
