<div>
      <div class="mt-8">
            <a href="{{route('movies.show', $movie['id'])}}">
               <img src="{{$movie['poster_path']}}" alt="" class="hover:opacity-50 transition ease-in-out duration-500">
            </a>
            <div class="mt-2">
               <a href="{{route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-red-500 transition ease duration-500">{{$movie['title']}}</a>
               <div class="flex items-center text-gray-400 text-sm mt-1">
                  <span><i class="fa fa-star text-orange-500"></i></span>
                  <span class="ml-1">{{$movie['vote_average']}}</span>
                  <span class="mx-2">|</span>
                  <span>{{$movie['release_date']}}</span>
               </div>
               <div class="text-gray-400 text-sm">{{$movie['genres']}}</div>
            </div>
      </div>
</div>
