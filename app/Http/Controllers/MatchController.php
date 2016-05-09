<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Match;

class MatchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
       public function store(Request $request)
    {

        $match = new Match;
        $match->student_id = $request->student_id;
        $match->tutor_id = Auth::user()->tutor_id;
        $match->accepted = false;

        $match->save();


       
        Session::flash('success','Successfully matched!');

        return redirect()->route('students.show', $match->student_id);//
        
    }
    
}
