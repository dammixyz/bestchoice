<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search = request()->query('search');
        if ($search){
            $movies = Movie::where('title', 'LIKE', "%{$search}%")
                ->orderBy('created_at', 'desc')->paginate(4);

        }else{
            $movies = Movie::orderBy('created_at', 'desc')->paginate(4);
        }
        $genre_id = auth()->user()->genre_id;
        $get_genre = Genre::where('id', $genre_id)->first();

        $mov = new Movie();
        $rating_sum = $mov->ratings()->sum('rating');
        $rating_count = $mov->ratings()->count();
        if ($rating_count){
            $rating_average = $rating_sum/$rating_count;
        }
        else{
            $rating_average = 0;
        }
        return view('home')->with('user_movie_interest', $get_genre)
                                ->with('all_movies', $movies)
                                ->with('search', $search)
                                ->with('rating_average', $rating_average);
    }
    public function welcome()
    {
        return view('welcome');
    }
}
