<div>
    <div class="relative mt-3 md:mt-0" x-data="{isOpen:true}" @click.away="isOpen=false">
    
        <input 
        wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" 
        placeholder="Search (Press / to focus)"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab`="isOpen = false">
        <div class="absolute top-0"><i class="fa fa-search text-gray-500 ml-2 mt-2"></i></div>
        <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>

        @if(strlen($search)>=3)
        <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4 overflow-y-scroll max-h-screen" x-show="isOpen">
            <ul>
                @forelse($searchResults as $result)
                <li class="border-b border-gray-700">
                    <a 
                    href="{{route('movies.show', $result['id'])}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center transition-ease-out
                    duration-150"
                    >
                    @if($result['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" class="w-12" alt="poster image">
                    @else
                        <img src="/imgs/logo.png" class="w-12" alt="poster image">
                    @endif
                        <span class="ml-4">{{$result['title']}}</span>
                    </a>
                </li>
                @empty
                <div class="px-3 py-3">Sorry, No results for {{$search}}</div>
                @endforelse
            </ul>
        </div>
        @endif
    </div>
</div>
