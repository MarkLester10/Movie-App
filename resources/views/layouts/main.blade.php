<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <livewire:styles>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>MoooV</title>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
            <li>
                <a href="{{route('movies.index')}}" class="flex items-center text-2xl text-gray-500"><img src="/imgs/logo.png" class="w-10 h-10 mr-2" alt="logo">MoooV</a>
            </li>
            <li class="md:ml-16 mt-3 md:mt-0">
            <a href="{{route('movies.index')}}" class="hover:text-red-500 transition ease duration-500">Movies</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
            <a href="/tvshows" class="hover:text-red-500">TV Shows</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
            <a href="{{route('actors.index')}}" class="hover:text-red-500">Actors</a>
            </li>
            </ul>

            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown/>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="">
                    <img src="/imgs/logo.jpeg" alt="#" class="rounded-full w-8 h-8">
                    </a>
                </div>


            </div>
        </div>
    </nav>
    @yield('content')

    <livewire:scripts>
    @yield('scripts')
</body>
</html>