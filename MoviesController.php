<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\MovieViewModel;
use App\ViewModels\MoviesViewModel;
use Illuminate\Support\Facades\Http;


class MoviesController extends Controller
{
    
    public function index()
    {


        $popularMovies = Http::withToken('***token***')
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];


        $genres = Http::withToken('***token***')
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        
 $viewModel = new MoviesViewModel(
            $popularMovies,
            $genres,
        );

        return view('movies.index', $viewModel);
    }

 
}
