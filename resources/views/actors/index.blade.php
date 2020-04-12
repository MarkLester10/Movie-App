@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-4 py-16">
        <div class="popular-actors">
        <h2 class="uppercase tracking-wider text-red-500 text-2xl font-semibold">popular actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($popularActors as $actor)
                <div class="actor mt-8">
                    <a href="{{route('actors.show', $actor['id'])}}">
                        <img src="{{$actor['profile_path']}}" alt="profile" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{route('actors.show', $actor['id'])}}" class="text-lg hover:text-red-500">{{ $actor['name'] }}</a>
                        <div class="text-small truncate text-gray-400">{{ $actor['known_for'] }}</div>
                        <small><i class="fa fa-star text-orange-500"></i> {{$actor['popularity']}}%</small>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- end of actors -->

        <div class="page-load-status">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-5xl">&nbsp;</div>
                <p class="infinite-scroll-last text-3xl my-8 text-gray-400">End of content</p>
                <p class="infinite-scroll-error text-3xl my-8 text-gray-400">Error</p>
            </div>
        </div>

     <!-- <div class="flex justify-between mt-16">
    @if($previous)
        <a href="{{route('actors.page', $previous)}}">Previous</a>
    @else
        <div></div>
    @endif

    @if($next)
        <a href="{{route('actors.page', $next)}}">Next</a>
    @else
        <div></div>
    @endif
    </div> -->

    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

<script>
    var elem = document.querySelector('.grid');
var infScroll = new InfiniteScroll( elem, {
  // options
  path: '/actors/page/@{{#}}',
  append: '.actor',
  status: '.page-load-status',
//   button: '.view-more-button',
//   scrollThreshold: false,
//   history: false,
});

</script>
@endsection