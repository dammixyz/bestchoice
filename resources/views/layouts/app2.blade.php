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
    @yield('title')
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                <a href="{{route('home')}}"><img class="logo" src="{{asset('images/bclogo1.png')}}" alt="" width="119" height="58"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default" href="{{route('home')}}" >
                            Home <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Movies<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            @foreach($categories as $category)
                                <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Celebrities <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="#">Nollywood (English)</a></li>
                            <li><a href="#">Nollywood (Yoruba)</a></li>
                            <li><a href="#">Nollywood (Hausa)</a></li>
                            <li><a href="#">Nollywood (Vintage)</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    @if(auth()->user()->isAdmin())
                        <li><a href="{{route('admin-panel')}}">Admin</a></li>
                    @endif
                    <li><a href="#">{{ Auth::user()->username }}</a></li>
                    <li class="btn">
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!-- top search form -->
        <form action="{{route('home')}}" method="get">
            <div class="top-search">
                <input type="text" name="search" value="{{request()->query('search')}}" placeholder="Search for the movie that you are looking for">
            </div>
        </form>
    </div>
</header>
<!-- END | Header -->

@yield('content')

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
<script src="{{asset('js2/vendor/all.js')}}"></script>
<script src="{{asset('js2/app/app.js')}}"></script>
{{--<script src="{{asset('js/rating.js')}}"></script>--}}

{{--This contains the JavaScript for rating--}}
@include('../rating')

</body>

</html>
