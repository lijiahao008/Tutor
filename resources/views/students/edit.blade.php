@extends('layouts.app')

@section('content')

    <style type="text/css">
               .btn-social {
            color: white;
            opacity: 0.8;
        }

            .btn-social:hover {
                color: white;
                opacity: 1;
                text-decoration: none;
            }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-twitter {
            background-color: #00aced;
        }

        .btn-linkedin {
            background-color: #0e76a8;
        }

        .btn-google {
            background-color: #c32f10;
        }
    </style>


{!! Form::model($student,['route'=> ['students.update', $student->id],'method' => 'PUT']) !!}
    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-4">
                    @if (Storage::disk('local')->has($student->last_name . '-' . $student->id . '.jpg'))
                        <img src="{{ route('student.photo', ['filename' => $student->last_name . '-' . $student->id . '.jpg']) }}" class="img-circle img-responsive" />
                    @endif
                    <br />
                    <br />


                        {{ Form::label('first_name', 'First Name:') }}
                        {{ Form::text ('first_name', null,array('class'=>'form-control')) }}


                        {{ Form::label('last_name', 'Last Name:') }}
                        {{ Form::text ('last_name', null,array('class'=>'form-control')) }}

                        {{ Form::label('date_of_birth', 'Date Of Birth:') }}
    					{{ Form::date ('date_of_birth', null,array('class'=>'form-control')) }}

    					{{ Form::label('zip', 'Zip Code:')}}
    					{{ Form::text ('zip', null,array('class'=>'form-control')) }}

					    {{ Form::label('Photo', 'Profile Image:') }}
    					{{ Form::file('photo', null,array('class'=>'form-control')) }}
                    <br>

                    <br /><br/>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>This is for alerts : </h2>
                        <h4>User profile template </h4>
                        <p>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                             3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
                        </p>
                    </div>

                    <div class="form-group col-md-8">
                        <br />
                        	{{ Form::label('education_level', 'Education Level:')}}
    						{{ Form::text ('education_level', null,array('class'=>'form-control'))}}

                        	{{ Form::label('phone_number', 'Phone number:')}}
    						{{ Form::text ('phone_number', null,array('class'=>'form-control'))}}

    						{{ Form::label('subject', 'Interested Subject:')}}
    						{{ Form::select('subject', array('Computer Science', 'English',  'Math'),array('class'=>'form-control'),['placeholder' => 'Pick a subject...']) }}

    						{{ Form::submit('Update', array('class' => 'btn btn-success btn-lg', 'style'=>'margin-top: 20px;')) }}

                            {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-lg', 'style'=>'margin-top: 20px;']) !!}

                            {!! Form::close() !!}
                        <br>
                    </div>
                </div>
            </div>
            <!-- ROW END -->


        </section>
        <!-- SECTION END -->
    </div>
    <!-- CONATINER END -->


    
    
{!! Form::close() !!}
	               

@endsection