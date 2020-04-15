@extends('layouts.main')


@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
           <div class="flex-none w-auto md:w-50">
            <img src="{{$actor['profile_path']}}" class="w-64 md:w-96 mx-auto"  alt="image">
                <ul class="flex items-center mt-4 justify-center">
                    @if($social['facebook_id'])
                    <li>
                        <a href="{{$social['facebook_id']}}" title="Facebook" class="text-2xl">
                           <i class="fa fa-facebook-official text-gray-400 hover:text-white w-12"></i>
                        </a>
                    </li>
                    @endif

                   @if($social['instagram_id'])
                   <li>
                        <a href="{{$social['instagram_id']}}" title="Instagram" class="text-2xl">
                            <i class="fa fa-instagram text-gray-400 hover:text-white w-12"></i>
                        </a>
                    </li>
                    @endif

                   @if($social['twitter_id'])
                   <li>
                        <a href="{{$social['twitter_id']}}" title="Twitter" class="text-2xl">
                            <i class="fa fa-twitter text-gray-400 hover:text-white w-12"></i>
                        </a>
                    </li>
                    @endif

                    @if($actor['homepage'])
                    <li>
                        <a href="{{$actor['homepage']}}" title="Website" class="text-2xl">
                            <i class="fa fa-globe text-gray-400 hover:text-white w-12"></i>
                        </a>
                    </li>
                    @endif
                </ul>
           </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold text-center md:text-left sm:mt-6 md:mt-6">{{ $actor['name'] }}</h2>
                <span><i class="fa fa-star text-orange-400"></i> {{$actor['popularity']}}</span>
                <div class="flex items-center text-gray-400 text-sm mt-2">
                        <span><i class="fa fa-birthday-cake text-red-400"></i></span>
                        <span class="ml-2">{{ $actor['birthday'] }} {{$actor['place_of_birth']}}</span>
                        <span class="mx-2">|</span>
                        <span>{{ $actor['age'] }}</span>
                </div>
                <p class="text-gray-300 mt-6">{{$actor['biography']}}</p>
                <h4 class="font-semibold mt-12">Known for these popular movies</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">

                        @foreach($knownForMovies as $movie)
                            <div class="mt-4">
                                <a href="{{$movie['linkToPage']}}">
                                    <img src="{{$movie['poster_path']}}" alt="movie" class="hover:opacity-50 transition ease-in-out duration-500">
                                </a>
                                <a href="{{$movie['linkToPage']}}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{ $movie['title'] }}</a>
                            </div>
                        @endforeach

                    </div>
            </div>
        </div>
    </div>
    <!-- end movie info -->


    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="leading-loose pl-5 mt-4 mx-auto">
              @foreach($credits as $credit)
              <li class="py-4 border-b hover:bg-gray-700 cursor-pointer text-lg">{{ $credit['release_year'] }} &middot; <strong>{{$credit['title']}}</strong>{{$credit['character']}}</li>
              @endforeach
            </ul>
        </div> 
    </div>

    <!-- end of casts -->
@endsection