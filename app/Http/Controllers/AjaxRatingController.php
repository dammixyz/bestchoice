<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;

class AjaxRatingController extends Controller
{
    public function rating(Request $request){
        $user_id = $request->user_id;
        $movie_id = $request->movie_id;
        $rating = $request->rating;
        $user_rating = Rating::where('user_id', $user_id)
                                ->where('movie_id', $movie_id)
                                ->pluck('rating')->first();
        if (!$user_rating){
            Rating::create([
                "user_id" => $user_id,
                "movie_id" => $movie_id,
                "rating" => $rating,
            ]);

            $new_rate = Rating::where('user_id', $user_id)
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
            $response = array(
                "status" => "newRating",
                "rating" => $new_rate,
                "rating_count" => $rating_count,
                "rating_average" => $rating_average
            );
            return response()->json($response);
        }
        else{
            $response = array("status" => "ratingExist");
            return response()->json($response);
        }
    }

    public function ratingUpdate(Request $request){
        $user_id = $request->user_id;
        $movie_id = $request->movie_id;
        $rating = $request->rating;
        Rating::where('user_id', $user_id)
                    ->where('movie_id', $movie_id)
                    ->update([
                    "rating" => $rating,
                ]);
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
        $response = array(
            "status" => "updatedRating",
            "rating" => $updated_rate,
            "rating_count" => $rating_count,
            "rating_average" => $rating_average
        );
        return response()->json($response);
    }
}
