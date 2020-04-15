<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class TvShowViewModel extends ViewModel
{
    public $tvshow;
    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }

    public function tvshow(){
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $this->tvshow['poster_path'],
            'vote_average' => $this->tvshow['vote_average'] * 10 . '%',
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres'=>collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvshow['credits']['crew'])->take(5),
            'cast' => collect($this->tvshow['credits']['cast'])->take(5)->map(function($cast){
                return collect($cast)->merge([
                    'profile_path'=>$cast['profile_path']
                    ?'https://image.tmdb.org/t/p/w300'. $cast['profile_path']
                    :'https://via.placeholder.com/300x450',
                ]);
            }),
            'backdrops' => collect($this->tvshow['images']['backdrops'])->take(9),
            'posters' => collect($this->tvshow['images']['posters'])->take(10),
        ])->only([
            'poster_path', 'id', 'genres', 'name', 'vote_average', 'overview', 'first_air_date', 'credits', 'videos',
            'images', 'crew', 'cast', 'backdrops', 'posters', 'created_by',
        ]);
    }
}
