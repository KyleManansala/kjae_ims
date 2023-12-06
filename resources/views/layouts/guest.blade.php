<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <!-- Scripts -->
        @vite([ 'resources/css/style.css' , 'resources/js/main.js'])
    </head>



    <body> 
        <img class="wave" src="img/wave.png">
        <div class="container">
            <div class="img">
                <img src="img/avatar.png">
            </div>

            <div class="login-content">
          
                {{ $slot }}
            </div>
            

        </div>
        
      
    </body>
    
</html>
