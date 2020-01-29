@extends('layouts.app3admin')
@section('title')
    <title>BestChoice | Admin - Add Movie</title>
@endsection
@section('content')
    <!-- Tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="{{route('movies.create')}}"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Add Movie</span></a></li>
        <li><a href=""><span class="hidden-sm hidden-xs"></span></a></li>
    </ul>
    <!-- // END Tabs -->

    <!-- Panes -->
    <div class="tab-content">
        <div id="account" class="tab-pane active">
            <form action="{{route('movies.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-md-2 control-label"><h4><b>Title</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Name of the movie" value="{{ old('title') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="overview" class="col-md-2 control-label"><h4><b>Overview</b></h4></label>
                    <div class="col-md-6">
                            <div class="input-group">
                                <textarea type="text" cols="200" rows="4" name="overview" class="form-control" id="year"  placeholder="Short description about the movie. The movie plot" required>{{ old('overview') }}</textarea>
                            </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="year" class="col-md-2 control-label"><h4><b>Released Year</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="year" class="form-control" id="year" placeholder="Released Year. example: 2017" value="{{ old('year') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="director" class="col-md-2 control-label"><h4><b>Director(s)</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="director" class="form-control" id="director" placeholder="Name(s) of Director(s). Example: Jim Iyke, Omotola Jolade" value="{{ old('director') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="writer" class="col-md-2 control-label"><h4><b>Writer(s)</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="writer" class="form-control" id="writer" placeholder="Name of the movie writer(s). Eample: Odunlade Adekola" value="{{ old('writer') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="stars" class="col-md-2 control-label"><h4><b>Featured Stars</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="stars" class="form-control" id="stars" placeholder="Name of Featured Stars. Example: Jim Iyke, Uche Jombo, Tonto Dike" value="{{ old('stars') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="runtime" class="col-md-2 control-label"><h4><b>Runtime</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="runtime" class="form-control" id="runtime" placeholder="Time elapse of the movie. Example: 120mins" value="{{ old('runtime') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="released_date" class="col-md-2 control-label"><h4><b>Released Date</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="released_date" class="form-control" id="released_date" placeholder="Released Date. Example: May 25, 2014" value="{{ old('released_date') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mmpa_rating" class="col-md-2 control-label"><h4><b>MMPA Rating</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="mmpa_rating" class="form-control" id="mmpa_rating" placeholder="MMPA Rating. Example: PG-16" value="{{ old('mmpa_rating') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="youtube_code" class="col-md-2 control-label"><h4><b>Youtube Code</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <input type="text" name="youtube_code" class="form-control" id="youtube_code" placeholder="this is the last related letters of a video address. example: 9bWLZLXWads" value="{{ old('youtube_code') }}" required>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="category_id" class="col-md-2 control-label"><h4><b>Category</b></h4></label>
                    <div class="col-md-6">
                        <select name="category_id" id="genres" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="genre" class="col-md-2 control-label"><h4><b>Genre</b></h4></label>
                    <div class="col-md-6">
                        <select name="genres[]" id="genres" class="form-control genre-selected" required multiple>
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}">
                                    {{$genre->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="poster" class="col-md-2 control-label"><h4><b>Poster</b></h4></label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <input type="file" name="poster" class="form-control" id="poster" placeholder="Poster" value="{{ old('poster') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Save</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- // END Panes -->
@endsection

@section('scripts')
    {{--adding js for trix, flatpickr, and select2--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        flatpickr('#released_datetttt', {
            enableTime: false,
            enableSeconds: false
        })

        $(document).ready(function() {
            $('.genre-selected').select2();
        });
    </script>

@endsection

@section('css')
    {{--adding css for trix, flatpickr, and  select2--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

@endsection
