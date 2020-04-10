<?php

namespace Tests\Feature;
namespace App\Http\Livewire;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class viewMoviesTests extends TestCase
{
  public function  the_search_dropdown_works_correctly(){
    Http::fake([
      'https://api.themoviedb.org/3/search/movie?query=jumanji'=> $this->fakeSearchMovies(),
    ]);


    Livewire::test('search-dropdown')
    ->assertDontSee('jumaji')
    ->set('search', 'jumaji')
    ->assertSee('Jumaji');

}

private function fakeSearchMovies(){
  return Http::response([
    'results'=>[
      "popularity" => 453.361,
      "vote_count" => 2875,
      "video" => false,
      "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
      "id" => 419704,
      "adult" => false,
      "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
      "original_language" => "en",
      "original_title" => "Ad Astra",
      "genre_ids" => [
        0 => 18,
        1 => 878,
      ],
      "title" => "Jumaji fake",
      "vote_average" => 5.9,
      "overview" => "The Fake jumaji.",
      "release_date" => "2019-09-17",
    ]
    ],200);
}
}
