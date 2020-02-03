@extends('layouts.app2')
@section('title')
    <title>BestChoice | Movie Review</title>
@endsection
@section('content')
    <div class="hero mv-single-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <h1> movie listing - list</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="#">Home</a></li>
                        <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <div class="page-single movie-single movie_single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img sticky-sb">
                        <img src="{{asset('storage/'.$movie->poster)}}" alt="">
                        <div class="movie-btn">
                            <div class="btn-transform transform-vertical red">
                                <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
                                <div><a href="https://www.youtube.com/embed/{{$movie->youtube_code}}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content">
                        <h1 class="bd-hd">{{$movie->title}} <span>({{$movie->year}})</span></h1>
                        <div class="social-btn">
                            <div class="hover-bnt">
                                <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
                                <div class="hvr-item">
                                    <a href="https://twitter.com/search/from:@dammi88" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                    <a href="https://instagram.com/stunnerthegreat" class="hvr-grow"><i class="ion-social-instagram"></i></a>
                                    <a href="https://wa.me/2348186818135" class="hvr-grow"><i class="ion-social-whatsapp"></i></a>
                                    {{--<a href="whatsapp://send?text=The text " data-action="share/whatsapp/share" class="hvr-grow"><i class="ion-social-whatsapp"></i></a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="movie-rate">
                            <div class="rate">
                                <i class="ion-android-star"></i>
                                <p><span class="rating-average">{{$rating_average}}</span> /5<br>
                                    <span class="rv">Overall Rating ({{$rating_count}})</span>
                                </p>
                            </div>
                            <div class="rate-star">
                                @if(!$updated_rate)
                                    <p>Rate This Movie:  </p>
                                    <button class="star1" onclick="ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star2" onclick="ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star3" onclick="ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star4" onclick="ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star5" onclick="ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                @elseif($updated_rate == 1)
                                    <p>Your Rate:  </p>
                                    <button class="star1" onclick="ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star2" onclick="ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star3" onclick="ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star4" onclick="ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star5" onclick="ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                @elseif($updated_rate == 2)
                                    <p>Your Rate:  </p>
                                    <button class="star1" onclick="ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star2" onclick="ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star3" onclick="ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star4" onclick="ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star5" onclick="ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                @elseif($updated_rate == 3)
                                    <p>Your Rate:  </p>
                                    <button class="star1" onclick="ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star2" onclick="ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star3" onclick="ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star4" onclick="ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                    <button class="star5" onclick="ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                @elseif($updated_rate == 4)
                                    <p>Your Rate:  </p>
                                    <button class="star1" onclick="ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star2" onclick="ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star3" onclick="ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star4" onclick="ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star5" onclick="ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star-outline"></i>
                                    </button>
                                @elseif($updated_rate == 5)
                                    <p>Your Rate:  </p>
                                    <button class="star1" onclick="ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star2" onclick="ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star3" onclick="ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star4" onclick="ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                    <button class="star5" onclick="ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})" style="background: transparent; border: none; padding: 0; outline: none;">
                                        <i class="ion-ios-star"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="movie-tabs">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#overview">Overview</a></li>
                                    <li><a href="#reviews"> Reviews</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overview" class="tab active">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <div style="color: #fff; margin-bottom: 5px;">
                                                    <h4>Plot</h4>
                                                </div>
                                                <div style="font-size: 20px;">
                                                    <p>{{$movie->overview}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="sb-it">
                                                    <h6>Category: </h6>
                                                    <p><a href="{{route('categories.show', $movie->category->id)}}">{{$movie->category->name}}</a></p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Genre:</h6>
                                                    <p class="tags">
                                                        @foreach($movie->genres as $genre)
                                                            <span class="time"><a href="#">{{$genre->name}}</a></span>
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Director: </h6>
                                                    <p>{{$movie->director}}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Writer: </h6>
                                                    <p>{{$movie->writer}}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Stars: </h6>
                                                    <p>{{$movie->stars}}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Release Date:</h6>
                                                    <p>{{$movie->released_date}}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Run Time:</h6>
                                                    <p>{{$movie->runtime}}</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>MMPA Rating:</h6>
                                                    <p>{{$movie->mmpa_rating}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="reviews" class="tab review">
                                        <div class="row">
                                            @if(count($movie->comments)>0)
                                                <div class="topbar-filter">
                                                    <p>Found <span>{{count($movie->comments)==1 ? count($movie->comments)." Comment" : count($movie->comments). " Comments" }}</span> in total</p>
                                                </div>
                                                @foreach($movie->comments as $comment)
                                                    <div class="mv-user-review-item">
                                                        <div class="user-infor">
                                                            <img src="{{asset('images/upload/user.png')}}" alt="">
                                                            <div>
                                                                <h3>{{$comment->title}}</h3>
                                                                <div class="no-star">
                                                                    @if(!$comment->user->rating)
                                                                        <p>Rate This Movie:  </p>
                                                                        <button class="star1" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star2" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star3" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star4" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star5" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                    @elseif($comment->user->rating->rating == 1)
                                                                        <button class="star1" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star2" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star3" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star4" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star5" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                    @elseif($comment->user->rating->rating == 2)
                                                                        <button class="star1" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star2" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star3" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star4" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star5" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                    @elseif($comment->user->rating->rating == 3)
                                                                        <button class="star1" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star2" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star3" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star4" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                        <button class="star5" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                    @elseif($comment->user->rating->rating == 4)
                                                                        <button class="star1" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star2" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star3" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star4" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star5" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star-outline"></i>
                                                                        </button>
                                                                    @elseif($comment->user->rating->rating == 5)
                                                                        <button class="star1" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 1, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star2" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 2, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star3" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 3, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star4" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 4, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                        <button class="star5" onclick=" @if($comment->user->id == Auth::user()->id)ratingCreate(this, 5, {{ Auth::user()->id }}, {{$movie->id}})@endif" style="background: transparent; border: none; padding: 0; outline: none;"
                                                                                @if($comment->user->id != Auth::user()->id)
                                                                                    disabled
                                                                                @endif
                                                                        >
                                                                            <i class="ion-ios-star"></i>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                                <p class="time">
                                                                    {{$comment->created_at->diffForHumans()}} by <a href="#"> {{$comment->user->username}}</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <p>{{$comment->review}}</p>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>Nobody reviewed this movie yet... add a review below to share your opinion.</p>
                                            @endif


                                            <!-- blog detail section-->
                                            <div class="page-single">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                                            <div class="blog-detail-ct">

                                                                <!-- comment items -->

                                                                <div class="comment-form">
                                                                    <h4>Leave a Review</h4>
                                                                    <form action="{{route('comments.store', $movie->id)}}" method="post">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <input type="text" name="title" placeholder="Your Review Title" required>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <textarea name="review" id="" style="width: 700px; height: 150px;" placeholder="Your Review"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <input  class="submit" type="submit" value="Submit Review">
                                                                    </form>
                                                                </div>
                                                                <!-- comment form -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end of  blog detail section-->
                                            <div class="topbar-filter">
                                                <label></label>
                                                <div class="pagination2">
                                                    <span>Page 1 of 2:</span>
                                                    <a class="active" href="#">1</a>
                                                    <a href="#">2</a>
                                                    <a href="#"><i class="ion-arrow-right-b"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
