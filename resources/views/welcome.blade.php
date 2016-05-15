@extends('layouts.app')

@section('content')
<style>

.business-header {
    height: 250px;
    background: url('BC Tutor Connection banner.png') center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}

.img-center {
    margin: 0 auto;
}


</style>
    <header class="business-header">
        
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    

                    </div>
                </div>
            </div>
        </div>
    </header>
    


    <!-- Page Content -->
     <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Tutor Connection
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Find A Student</h4>
                    </div>
                    <div class="panel-body">
                       <form class="navbar-form navbar-left" role="search" action="{{route('search.student_results')}}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search_students" placeholder="Search">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Find A Tutor</h4>
                    </div>
                    <div class="panel-body">
                        <form class="navbar-form navbar-left" role="search" action="{{route('search.tutor_results')}}">
                            <div class="form-group">
                            <input type="text" class="form-control" name="search_tutors" placeholder="Search">
                            <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Advanced Search</h4>
                    </div>
                    <div class="panel-body">
                        <form class="navbar-form navbar-left" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="advanced_search" placeholder="Advanced Search">
                                <a href="#" class="btn btn-default">Search</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->


      

    </div>
    <!-- /.container -->



@endsection
