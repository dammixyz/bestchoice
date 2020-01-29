@extends('layouts.app3admin')
@section('title')
    <title>BestChoice | Admin - Add Category</title>
@endsection
@section('content')
    <!-- Tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="{{route('categories.create')}}"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Add Category</span></a></li>
        <li><a href=""><span class="hidden-sm hidden-xs"></span></a></li>
    </ul>
    <!-- // END Tabs -->

    <!-- Panes -->
    <div class="tab-content">

        <div id="account" class="tab-pane active">
            <form action="{{route('categories.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-2 control-label">Category Name</label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input name="name" type="text" class="form-control used" id="name" placeholder="Enter Category Name" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Save Changes</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- // END Panes -->
@endsection
