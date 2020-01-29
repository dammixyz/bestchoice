<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    //

    public function movies(){
        //or... return $this->belongsTo('App\Category');


        //This means that one category can have many posts
        return $this->hasMany(Movie::class);
    }
}
