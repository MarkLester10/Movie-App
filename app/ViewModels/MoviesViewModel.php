<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $genres;
    public $npMovies;

    public function __construct($popularMovies, $genres, $npMovies)
    {
        $this->popularMovies = $popularMovies;
        $this->genres = $genres;
        $this->npMovies = $npMovies;
    }

    public function popularMovies(){
        return $this->formatMovies($this->popularMovies);
    }

    public function npMovies(){
        return $this->formatMovies($this->npMovies);
    }


    public function genres(){

        return collect($this->genres)->mapWithKeys(function($genre){
            return [$genre['id']=>$genre['name']];
        });
    }

    private function formatMovies($movies){
        return collect($movies)->map(function($movie){
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value){
                return [$value=>$this->genres()->get($value)];
            })->implode(', ');


            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                // 'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres'=>$genresFormatted,
            ]);
        });
    }
}
