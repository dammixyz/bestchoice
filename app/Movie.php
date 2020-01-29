<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'overview', 'year', 'director', 'stars',
        'runtime', 'category_id', 'poster', 'writer', 'released_date', 'mmpa_rating', 'youtube_code' ];
    public function category(){
        //or... return $this->belongsTo('App\Category');


        //This means that many movies belong to a category
        //This will automatically find 'category_id' in the movies table to check the category a movie belongs
        return $this->belongsTo(Category::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }
}
