<?php

namespace App\Http\Controllers;

use App\Category;
use App\Genre;
use Illuminate\Http\Request;

class AdminActions extends Controller
{
    public function index(){
        return view('admin.add-content')->with('categories', Category::all())
            ->with('genres', Genre::all());
    }
}
