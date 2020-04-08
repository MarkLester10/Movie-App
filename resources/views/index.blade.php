@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-red-500 text-lg font-semibold">popular movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres"/>
            @endforeach

        </div>
        <!-- end of popular movies -->


        <div class="now-playing-movies py-24">
        <h2 class="uppercase tracking-wider text-red-500 text-lg font-semibold">now playing</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        
        @foreach($npMovies as $movie)
            <x-movie-card :movie="$movie" :genres="$genres"/>
        @endforeach

        </div>
    </div>
@endsection