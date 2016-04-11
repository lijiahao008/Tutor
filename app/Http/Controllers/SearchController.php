<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
use App\Tutor;

class SearchController extends Controller {

	public function getStudentsResults(Request $request) {

		$search_students = $request -> input('search_students');

		if (!$search_students) {
			return redirect()->route('students.index');
		}

		$students = Student::where(DB::raw("CONCAT(first_name,' ',last_name)"),'LIKE',"%{$search_students}%")
							->orWhere('subject','LIKE',"%{$search_students}%")
							->orWhere('education_level','LIKE',"%{$search_students}%")
							->orWhere('zip','LIKE',"%{$search_students}%")

							->get();

		return view('search.student_results')->withStudents($students);
	}

	public function getTutorsResults(Request $request) {

		$search_tutors = $request -> input('search_tutors');

		if (!$search_tutors) {
			return redirect()->route('tutors.index');
		}

		$tutors = Tutor::where(DB::raw("CONCAT(first_name,' ',last_name)"),'LIKE',"%{$search_tutors}%")
							->orWhere('subject','LIKE',"%{$search_tutors}%")
							->orWhere('education_level','LIKE',"%{$search_tutors}%")
							->orWhere('zip','LIKE',"%{$search_tutors}%")

							->get();
		return view('search.tutor_results')->withTutors($tutors);
	}


}