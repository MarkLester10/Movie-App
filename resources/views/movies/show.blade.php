@extends('layouts.main')


@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{$movie['poster_path']}}" class="w-64 md:w-96 mx-auto"  alt="image">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold sm:mt-6 md:mt-6">{{$movie['title']}}</h2>
                <small class="text-red-500 text-xl mt-16">{{$movie['tagline']}}</small>
                <div class="flex items-center text-gray-400 text-sm mt-2">
                        <span><i class="fa fa-star text-orange-500"></i></span>
                        <span class="ml-1">{{$movie['vote_average']}}</span>
                        <span class="mx-2">|</span>
                        <span>{{$movie['release_date']}}</span>
                        <span class="mx-2">|</span>
                        <span>
                           {{$movie['genres']}}
                        </span>
                </div>
                <p class="text-gray-300 mt-6">{{$movie['overview']}}</p>
                
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                    @foreach($movie['crew'] as $crew)
                        <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                        </div>
                    @endforeach
                    </div>
                </div>

                <!-- video trailer -->
                <div x-data="{isOpen: false}">
                @if(count($movie['videos']['results']) > 0)
                <div class="mt-12">
                    <button
                     @click="isOpen = true" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4
                    hover:bg-red-600 hover:text-white transition ease-in-out duration-500">
                    <div class="text-2xl"><i class="fa fa-play-circle"></i></div>
                    <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
                @endif
                
                <!-- modal -->
                <div
                x-show.transition.opacity="isOpen"
                style="background-color: rgba(0,0,0,0.5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%;">
                                    <iframe width="560" height="315" class="responsive-iframe absolute
                                    top-0 left-0 w-full h-full" 
                                    src="https://youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" 
                                    style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of modal -->
                </div>
                <!-- end of video trailer -->

            </div>
        </div>
    </div>
    <!-- end movie info -->


    <div class="movie-casts border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Casts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach($movie['cast'] as $cast)
                        <div class="mt-8">
                            <a href="{{route('actors.show', $cast['id'])}}">
                                <img src="https://image.tmdb.org/t/p/w200/{{$cast['profile_path']}}" alt="" class="hover:opacity-50 transition ease-in-out duration-500">
                            </a>
                            <div class="mt-2">
                                <a href="{{route('actors.show', $cast['id'])}}" class="text-lg mt-2 hover:text-red-500 transition ease duration-500">{{$cast['name']}}</a>
                                <div class="text-gray-400 text-sm">
                                as {{$cast['character']}}
                                </div>
                            </div>
                        </div>
                @endforeach

            </div>
        </div> 
    </div>

    <!-- end of casts -->

    <div class="movie-images" x-data="{isOpen:false, image:''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($movie['backdrops'] as $image)
                    <div class="mt-8">
                        <a href="#" 
                        @click.prevent="
                        isOpen=true,
                        image='{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'
                        ">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="" class="hover:opacity-50 transition ease-in-out duration-500">
                        </a>
                    </div>
                @endforeach
            </div>

            <div
                x-show.transition.scale="isOpen"
                style="background-color: rgba(0,0,0,0.5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen=false" @keydown.escape.window="isOpen=false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="image">
                            </div>
                        </div>
                    </div>
                </div>


        </div> 
    </div>
    <!-- end of images -->

    <div class="movie-posters">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Posters</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($movie['posters'] as $image)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w300/'.$image['file_path']}}" alt="" class="hover:opacity-50 transition ease-in-out duration-500">
                        </a>
                    </div>
                @endforeach
            </div>
        </div> 
    </div>
@endsection