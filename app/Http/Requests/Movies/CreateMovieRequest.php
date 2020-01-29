<?php

namespace App\Http\Requests\Movies;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:movies',
            'overview' => 'required',
            'year' => 'required',
            'director' => 'required',
            'stars' => 'required',
            'runtime' => 'required',
            'writer' => 'required',
            'released_date' => 'required',
            'mmpa_rating' => 'required',
            'youtube_code' => 'required',
            'category_id' => 'required',
            'poster' => 'required|image'
        ];
    }
}
