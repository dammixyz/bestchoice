<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<head>
    <!-- Basic need -->
    <title>BestChoice | Welcome</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <!-- CSS files -->
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{asset('izitoast/css/iziToast.min.css')}}">

</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="{{asset('images/bclogo1.png')}}" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Enter Username" required/>
                </label>
            </div>

            <div class="row">
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="******" required />
                </label>
            </div>
            <div class="row">
                <div class="remember">
                    <div>
                        <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
                    </div>
                    <a href="#">Forget password ?</a>
                </div>
            </div>
            <div class="row">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="row">
            <p>Or via social</p>
            <div class="social-btn-2">
                <a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
                <a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <label for="name">
                    Full Name:
                    <input type="text" name="name" id="name" placeholder="Enter Your Full Name" required/>
                </label>
            </div>
            <div class="row">
                <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Enter Your Username" required/>
                </label>
            </div>

            <div class="row">
                <label for="interest">
                        Interest:
                    <select name="interest" required>
                        <option selected disabled>-Choose Your Movie Interest-</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="email" name="email" id="email-2" placeholder="" required/>
                </label>
            </div>
            <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="" required/>
                </label>
            </div>
            <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="password_confirmation" id="repassword-2" placeholder=""  required />
                </label>
            </div>
            <div class="row">
                <button type="submit">sign up</button>
            </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                @auth()
                    <a href="{{route('home')}}"><img class="logo" src="{{asset('images/bclogo1.png')}}" alt="" width="119" height="58"></a>
                @else
                    <a href="{{url('/')}}"><img class="logo" src="{{asset('images/bclogo1.png')}}" alt="" width="119" height="58"></a>
                @endauth

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                    @auth()
                        <li class="dropdown first">
                            <a class="btn btn-default" href="{{route('home')}}" >
                                Home <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                    @endauth


                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    @auth()
                        <li ><a href="#">{{ Auth::user()->username }}</a></li>
                        <li class="btn ">
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="loginLink"><a href="#">LOG In</a></li>
                        <li class="btn signupLink"><a href="#">sign up</a></li>
                    @endauth
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!-- top search form -->
        <div class="top-search">
            <input type="text" placeholder="Search for a movie, TV Show or celebrity that you are looking for">
        </div>
    </div>
</header>
<!-- END | Header -->

<div class="slider movie-items">
    <div class="container">
        <div class="row">
               <h2 style="color: #fff; margin-left: 1px;" >Recently Added</h2>
            <div  class="slick-multiItemSlider">
                @foreach($movies as $movie)
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#"><img src="{{asset('storage/'.$movie->poster)}}" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="#">Comedy</a></span>
                            </div>
                            <h6><a href="#">{{$movie->title}}</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- footer section-->
<footer class="ht-footer">
    <div class="ft-copyright">
        <div class="ft-left">
            <p>© 2020 BestChoice. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<!-- end of footer section-->
<script src="{{asset('izitoast/js/iziToast.min.js')}}"></script>
<script type="text/javascript">
    @if(session('success'))
    iziToast.success({
        title: '',
        message: "{{session()->get('success')}}",
        position: 'topRight'
    });
    @endif
    @if(session('danger'))
    iziToast.error({
        title: '',
        message: "{{session()->get('danger')}}",
        position: 'topRight'
    });
    @endif
    @if(session('update'))
    iziToast.info({
        title: '',
        message: "{{session()->get('update')}}",
        position: 'topRight'
    });
    @endif
    @if(session('warning'))
    iziToast.warning({
        title: '',
        message: "{{session()->get('warning')}}",
        position: 'topRight'
    });
    @endif
    @if(count($errors)>0)
    iziToast.warning({
        title: '',
        message: "@if(count($errors)>0)\n" +
            "                                @foreach($errors->all() as $error)\n" +
            "                                        {{$error}}\n" +
            "                                @endforeach\n" +
            "                            @endif",
        position: 'topRight'
    });
    @endif



</script>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/plugins2.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('jquery-selectric/jquery-selectric.js')}}"></script>
</body>

</html>
