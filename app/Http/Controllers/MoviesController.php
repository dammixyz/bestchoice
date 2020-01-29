<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Genre;
use App\Http\Requests\Movies\CreateMovieRequest;
use App\Movie;
use App\Rating;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-content')->with('categories', Category::all())
            ->with('genres', Genre::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-content')->with('categories', Category::all())
            ->with('genres', Genre::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieRequest $request)
    {
        //dd($request->all());

        //upload image to storage .. dont forget to go to filesystems.php file in config folder and copy FILESYSTEM_DRIVER to env and set it to public
        $poster = $request->poster->store('movie_posters');
        //create post
        $movie = Movie::create([
            'title' => $request->title,
            'overview' => $request->overview,
            'year' => $request->year,
            'poster' => $poster,
            'director' => $request->director,
            'stars' => $request->stars,
            'runtime' => $request->runtime,
            'writer' => $request->writer,
            'released_date' => $request->released_date,
            'mmpa_rating' => $request->mmpa_rating,
            'youtube_code' => $request->youtube_code,
            'category_id' => $request->category_id,
        ]);

        if ($request->genres){
            $movie->genres()->attach($request->genres);
        }

        //flash a message
        session()->flash('success', 'Movie was added successfully');

        //Return redirect
        return redirect(route('movies.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param Movie $movie
     * @return void
     */
    public function show(Movie $movie)
    {
        $user_id = auth()->id();
        $movie_id = $movie->id;
        $updated_rate = Rating::where('user_id', $user_id)
            ->where('movie_id', $movie_id)
            ->pluck('rating')->first();
        $rating_sum = Rating::where('movie_id', $movie_id)
            ->sum('rating');
        $rating_count = Rating::where('movie_id', $movie_id)->count();
        if ($rating_count){
            $rating_average = $rating_sum/$rating_count;
        }
        else{
            $rating_average = 0;
            $rating_count = 0;
        }
        return view('single-movie')->with('movie', $movie)
            ->with('updated_rate', $updated_rate)
            ->with('rating_average',$rating_average)
            ->with('rating_count',$rating_count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
