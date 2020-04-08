@extends('layouts.main')


@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" class="w-64 md:w-96 mx-auto"  alt="image">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold sm:mt-6 md:mt-6">{{$movie['title']}}</h2>
                <small class="text-red-500 text-xl mt-16">{{$movie['tagline']}}</small>
                <div class="flex items-center text-gray-400 text-sm mt-2">
                        <span><i class="fa fa-star text-orange-500"></i></span>
                        <span class="ml-1">{{$movie['vote_average'] * 10}}%</span>
                        <span class="mx-2">|</span>
                        <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                        <span class="mx-2">|</span>
                        <span>
                        @foreach($movie['genres'] as $genre)
                        {{$genre['name']}}@if(!$loop->last), @endif
                        @endforeach
                        </span>
                </div>
                <p class="text-gray-300 mt-6">{{$movie['overview']}}</p>
                
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                    @foreach($movie['credits']['crew'] as $crew)
                        @if($loop->index < 2)
                        <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                @if(count($movie['videos']['results']) > 0)
                <div class="mt-12">
                    <a href="https://youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4
                    hover:bg-red-600 hover:text-white transition ease-in-out duration-500">
                        <i class="fa fa-play-circle text-2xl"></i>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end movie info -->


    <div class="movie-casts border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Casts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach($movie['credits']['cast'] as $cast)
                    @if($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="https://image.tmdb.org/t/p/w200/{{$cast['profile_path']}}" alt="" class="hover:opacity-50 transition ease-in-out duration-500">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-red-500 transition ease duration-500">{{$cast['name']}}</a>
                                <div class="text-gray-400 text-sm">
                                as {{$cast['character']}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div> 
    </div>

    <!-- end of casts -->

    <div class="movie-images">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($movie['images']['backdrops'] as $image)
                    @if($loop->index < 9)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="" class="hover:opacity-50 transition ease-in-out duration-500">
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div> 
    </div>
    <!-- end of images -->

    <div class="movie-posters">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Posters</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($movie['images']['posters'] as $image)
                    @if($loop->index < 10)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w300/'.$image['file_path']}}" alt="" class="hover:opacity-50 transition ease-in-out duration-500">
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div> 
    </div>
@endsection