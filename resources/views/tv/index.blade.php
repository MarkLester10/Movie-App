@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-4 pt-16">
        <div class="popular-tvshows">
        <h2 class="uppercase tracking-wider text-red-500 text-2xl font-semibold">popular tv shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach($popularTv as $tvshow)
                <x-tv-card :tvshow="$tvshow"/>
            @endforeach

        </div>
    </div>
        <!-- end of popular tv shows -->


        <div class="top-rated-shows py-24">
        <h2 class="uppercase tracking-wider text-red-500 text-2xl font-semibold">Top rated shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        
        @foreach($topRatedTv as $tvshow)
            <x-tv-card :tvshow="$tvshow"/>
        @endforeach

        </div>
     </div>
    </div>
@endsection