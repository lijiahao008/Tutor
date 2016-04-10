<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Student;
use Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index')->withStudents($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);

        return view('students.create');->withUsers($user);//
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
                'date_of_birth' => 'required|before:today',
                'education_level' => 'required|max:100',
                'zip' => 'required|integer|digits:5',
                'phone_number' => 'required|integer',
              
                ));

       
        $student = new Student;

        $student->date_of_birth = $request->date_of_birth;
        $student->education_level = $request->education_level;
        $student->zip = $request->zip;
        $student->phone_number = $request->phone_number;
        $student -> save();

          $file = $request->file('photo');
        $filename = $request['phone_number'] . '-' . $student->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        Session::flash('success','Successfully created!');

        return redirect()->route('students.show', $student->id);//
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->withStudent($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->withStudent($student);
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
                'date_of_birth' => 'required|before:today',
                'education_level' => 'required|max:100',
                'zip' => 'required|integer|digits:5',
                'phone_number' => 'required|integer',
                ));

        $student = Student::find($id);

        $student->date_of_birth = $request->input('date_of_birth');
        $student->education_level = $request->input('education_level');
        $student->zip = $request->input('zip');
        $student->phone_number = $request->input('phone_number');
        
        $file = $request->file('photo');
        $filename = $request['phone_number'] . '-' . $student->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        $student -> save();//



        Session::flash('success', 'Profile was successfully updated');

        return redirect()->route('students.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        Session::flash('success', 'Your student profile was successfully deleted.');

        return redirect()->route('students.index');//
    }

    public function getStudentPhoto($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

}
