<!DOCTYPE html>
<html class="st-layout ls-top-navbar-large ls-bottom-footer show-sidebar sidebar-l3" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{asset('css2/vendor/all.css')}}" rel="stylesheet">
    <link href="{{asset('css2/app/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('izitoast/css/iziToast.min.css')}}">
    @yield('css')
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body>

<!-- Wrapper required for sidebar transitions -->
<div class="st-container">

    <!-- Fixed navbar -->
    <div class="navbar navbar-size-large navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#sidebar-menu" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand navbar-brand-primary navbar-brand-logo navbar-nav-padding-left">
                    <a href="{{asset('home')}}">
                        <img class="logo" src="{{asset('images/bclogo1.png')}}" alt="" width="119" height="58">
                    </a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="{{route('home')}}">Home </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Content <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin-panel')}}">Add Movie</a></li>
                            <li><a href="app-directory-list.html">Add Celebrity</a></li>
                            <li><a href="{{route('categories.create')}}">Add Category</a></li>
                            <li><a href="{{route('genres.create')}}">Add Genre</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar left sidebar-size-3 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse">
        <div data-scrollable>

            <div class="sidebar-block">
                <div class="profile">
                    <h4 class="text-display-1 margin-none">Admin Panel</h4>
                    <p>{{auth()->user()->username}}</p>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{route('movies.create')}}"><i class="fa fa-bar-chart-o"></i><span>Dashboard</span></a></li>
                <li>
                    <a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}<i class="fa fa-sign-out"></i><span></span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

        <!-- sidebar effects INSIDE of st-pusher: -->
        <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

        <!-- this is the wrapper for the content -->
        <div class="st-content">

            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">

                <div class="container-fluid">

                    <div class="page-section third">
                        <!-- Tabbable Widget -->
                        <div class="tabbable paper-shadow relative" data-z="0.5">

                            @yield('content')

                        </div>
                        <!-- // END Tabbable Widget -->

                    </div>

                </div>

            </div>
            <!-- /st-content-inner -->

        </div>
        <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

    <!-- Footer -->
    <footer class="footer">
        <strong>BestChoice</strong> &copy; Copyright 2020
    </footer>
    <!-- // Footer -->

</div>
<!-- /st-container -->
<script src="{{asset('izitoast/js/iziToast.min.js')}}"></script>
{{--@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}

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

<!-- Inline Script for colors and config objects; used by various external scripts; -->
<script>
    var colors = {
        "danger-color": "#e74c3c",
        "success-color": "#81b53e",
        "warning-color": "#f0ad4e",
        "inverse-color": "#2c3e50",
        "info-color": "#2d7cb5",
        "default-color": "#6e7882",
        "default-light-color": "#cfd9db",
        "purple-color": "#9D8AC7",
        "mustard-color": "#d4d171",
        "lightred-color": "#e15258",
        "body-bg": "#f6f6f6"
    };
    var config = {
        theme: "html",
        skins: {
            "default": {
                "primary-color": "#42a5f5"
            }
        }
    };
</script>
<script src="{{asset('js2/vendor/all.js')}}"></script>
<script src="{{asset('js2/app/app.js')}}"></script>

<script src="{{asset('upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="{{asset('upload-preview/assets/js/jquery.uploadPreview.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change Image",  // Default: Change File
            no_label: false                 // Default: false
        });
    });
</script>

@yield('scripts')
</body>


</html>
