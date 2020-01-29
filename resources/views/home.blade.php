@extends('layouts.app2')
@section('title')
    <title>BestChoice | Home</title>
@endsection
@section('content')
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>Hello, {{Auth::user()->username}} </h1>
                        <p style="font-size: 15px;">Here are few movies we recommend you watch today... Relax!<span style="font-size: 24px;">&#128512;</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if($search)
                        <div class="topbar-filter fw">
                            <p>Your <span><b><i>search</i></b></span> result for <span><b><i>"{{request()->query('search')}}"</i></b></span>:</p>
                        </div>
                        <div class="flex-wrap-movielist mv-grid-fw">
                            @forelse($all_movies as $movie)
                                <div class="movie-item-style-2 movie-item-style-1">
                                    <div style="width: 200px; height: 350px;" >
                                        <img src="{{asset('storage/'.$movie->poster)}}"alt="">
                                    </div>
                                    <div class="hvr-inner">
                                        <a  href="{{route('movies.show', $movie->id)}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="mv-item-infor">
                                        <h6><a href="">{{$movie->title}}</a></h6>
                                        <p class="rate"><i class="ion-android-star"></i><span>@if($movie->ratings->count() > 0){{$movie->ratings->sum('rating')/$movie->ratings->count()}}@else 0 @endif</span> /5</p>
                                    </div>
                                </div>
                            @empty
                                <div style="color: #fff;">
                                    <h5>We current do not have "{{request()->query('search')}}" in our system.</h5><br>
                                </div>
                            @endforelse
                        </div>
                        {{$all_movies->appends(['search' => request()->query('search')])->links()}}
                    @else
                        <div class="topbar-filter fw">
                            <p>Movies are suggested based on your <span><b><i>interest</i></b></span></p>
                        </div>
                        <div class="flex-wrap-movielist mv-grid-fw">
                            @foreach($user_movie_interest->movies as $movie)
                                <div class="movie-item-style-2 movie-item-style-1">
                                    <div style="width: 200px; height: 350px;" >
                                        <img src="{{asset('storage/'.$movie->poster)}}"alt="">
                                    </div>
                                    <div class="hvr-inner">
                                        <a  href="{{route('movies.show', $movie->id)}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="mv-item-infor">
                                        <h6><a href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a></h6>
                                        <p class="rate"><i class="ion-android-star"></i><span>@if($movie->ratings->count() > 0){{$movie->ratings->sum('rating')/$movie->ratings->count()}}@else 0 @endif</span> /5</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="topbar-filter fw">
                            <p>Some of our <span><b><i>newest</i></b></span> movies you may be intersted in.</p>
                        </div>
                        <div class="flex-wrap-movielist mv-grid-fw">
                            @foreach($all_movies as $movie)
                                <div class="movie-item-style-2 movie-item-style-1">
                                    <div style="width: 200px; height: 350px;" >
                                        <img src="{{asset('storage/'.$movie->poster)}}"alt="">
                                    </div>
                                    <div class="hvr-inner">
                                        <a  href="{{route('movies.show', $movie->id)}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="mv-item-infor">
                                        <h6><a href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a></h6>
                                        <p class="rate"><i class="ion-android-star"></i><span>@if($movie->ratings->count() > 0){{$movie->ratings->sum('rating')/$movie->ratings->count()}}@else 0 @endif</span> /5</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{$all_movies->links()}}

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

