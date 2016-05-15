<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Tutor;
use Session;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;


class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show','getTutorPhoto']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutors = Tutor::all();

        return view('tutors.index')->withTutors($tutors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutors.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'date_of_birth' => 'required|before:today',
                'education_level' => 'required|max:100',
                'address' => 'required|max:100',
                'zip' => 'required|integer|digits:5',
                'phone_number' => 'required|max:20',
                'rate_per_hour' => 'required|integer',
                'subject' => 'required|max:50',
                

                ));

       
        $tutor = new Tutor;

        $tutor->first_name = $request->first_name;
        $tutor->last_name = $request->last_name;
        $tutor->date_of_birth = $request->date_of_birth;
        $tutor->education_level = $request->education_level;
        $tutor->address = $request->address;
        $tutor->zip = $request->zip;
        $tutor->phone_number = $request->phone_number;
        $tutor->rate_per_hour = $request->rate_per_hour;
        $tutor->subject = $request->subject;
        $tutor->user_id = Auth::user()->id;
        $tutor -> save();

        Auth::user()->tutor_id = $tutor->id;
        Auth::user()->save();

        $file = $request->file('photo');
        $filename = $request['rate_per_hour'] . '-' . $tutor->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        Session::flash('success','Successfully Created!');

        return redirect()->route('tutors.show', $tutor->id);//
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutor = Tutor::find($id);
        $nearby_tutors = DB::table('tutors')
                     ->whereBetween('zip',[$tutor->zip - 10,$tutor->zip + 10])
                        ->get();
        return view('tutors.show')->withTutor($tutor)->withNearby_tutors($nearby_tutors);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tutor = Tutor::find($id);
        if ($tutor-> user_id == Auth::user()->id){
            return view('tutors.edit')->withTutor($tutor);
        }
        else{
            Session::flash('failed','Sorry, you do not have the permission.');
            return redirect()->route('tutors.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,array(
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'date_of_birth' => 'required|before:today',
                'education_level' => 'required|max:100',
                'address' => 'required|max:100',
                'zip' => 'required|integer|digits:5',
                'phone_number' => 'required|max:20',
                'rate_per_hour' => 'required|integer',
                'subject' => 'required|max:50',

                ));

        $tutor = Tutor::find($id);

        $tutor->first_name = $request->input('first_name');
        $tutor->last_name = $request->input('last_name');
        $tutor->date_of_birth = $request->input('date_of_birth');
        $tutor->education_level = $request->input('education_level');
        $tutor->address = $request->input('address');
        $tutor->zip = $request->input('zip');
        $tutor->phone_number = $request->input('phone_number');
        $tutor->rate_per_hour = $request->input('rate_per_hour');
        $tutor->subject = $request->input('subject');

        $file = $request->file('photo');
        $filename = $request['rate_per_hour'] . '-' . $tutor->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        $tutor -> save();//



        Session::flash('success', 'Profile was successfully updated');

        return redirect()->route('tutors.show', $tutor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutor = Tutor::find($id);
        
        Auth::user()->tutor_id = 0;

        Auth::user()->save();

        $tutor->delete();

        Session::flash('success', 'Your tutor profile was successfully deleted.');

        return redirect()->route('tutors.index');//
    }

    public function getTutorPhoto($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

}
