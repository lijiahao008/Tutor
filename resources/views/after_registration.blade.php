@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <p>Thank you for signing up for Tutor Connection! Please create a profile in order to enjoy the full feature of Tutor Connection.</p>
        <p><a href="{{ route('students.create')}}" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>Create Your Student Profile</button></a>
        </p>
        <p><a href="{{ route('students.create')}}" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>Create Your Tutor Profile</button></a>
        </p>
    </div>
            

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                     <a href="{{ route('students.create')}}" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Create Your Student Profile
                    </button></a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Create Your Tutor Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
