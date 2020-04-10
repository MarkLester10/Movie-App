<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <livewire:styles>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Movie App</title>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
            <li>
                <a href="/" class="flex items-center text-2xl text-gray-500"><img src="/imgs/logo.png" class="w-10 h-10 mr-2" alt="logo">MoooV</a>
            </li>
            <li class="md:ml-16 mt-3 md:mt-0">
            <a href="/" class="hover:text-red-500 transition ease duration-500">Movies</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
            <a href="#" class="hover:text-red-500">TV Shows</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
            <a href="#" class="hover:text-red-500">Actors</a>
            </li>
            </ul>

            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown/>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="">
                    <img src="/imgs/avatar.jpg" alt="#" class="rounded-full w-8 h-8">
                    </a>
                </div>


            </div>
        </div>
    </nav>
    @yield('content')

    <livewire:scripts>
</body>
</html>