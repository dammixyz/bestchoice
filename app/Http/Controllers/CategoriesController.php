<?php

namespace App\Http\Controllers;

use App\Category;
use App\Genre;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Movie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $categoryExist = Category::where('name', $request->name)->first();
        if (!$categoryExist){
            Category::create(['name' => $request->name]);

            session()->flash('success', 'Category added successfully!');

            return redirect('categories.index');
        }
        else{
            session()->flash('danger', 'Category already exist!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
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
        return view('category')->with('user_movie_interest', $get_genre)
            ->with('all_movies', $movies)
            ->with('search', $search)
            ->with('rating_average', $rating_average)
            ->with('category', $category);
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
