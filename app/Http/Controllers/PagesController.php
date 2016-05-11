<?php

namespace App\Http\Controllers;

use App\Student;
use App\Tutor;
use Auth;

class PagesController extends Controller {

	public function getIndex() {

		return view('welcome');
	}

	public function getAbout() {

		return view('about');
	}

	public function getContact() {

		return view('contact');
	}

	public function manageStudentProfile(){
		if (Auth::user()->student_id == 0){
			return view('students.create');
		}
		else{
			$student = Student::find(Auth::user()->student_id);
			return view('students.edit')->withStudent($student);
		}
	}
	
	public function manageTutorProfile(){
		if (Auth::user()->tutor_id == 0){
			return view('tutors.create');
		}
		
		else{
			$tutor = Tutor::find(Auth::user()->tutor_id);
			return view('tutors.edit')->withTutor($tutor);
		}
	}


	public function getAfter_registration() {

		return view('after_registration');
	}

}