<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // display main pages
    public function index(){
        // $students = Student::paginate(5);
        $students = Student::orderBy('id','DESC')->paginate(5);
        return view('student.index')->with(compact('students'));
    }

    // add student data
    public function store(Request $request){

        // $request->validated();

        $Student = new Student();

        $Student->fname = $request->fname;
        $Student->lname = $request->lname;
        $Student->email = $request->email;
        $Student->phone = $request->phone;
        $Student->course = $request->course;
        $Student->save();


        // return response()->with('success','Student Created Successfully.');
    }

    // fetch student data by id
    public function show($id){
        $student = Student::find($id);
        return with(compact('student'));
    }

    // fetch student data for edit
    public function edit($id){
        $student = Student::find($id);
        return with(compact('student'));
    }

    // update student data
    public function update(Request $request, $id){
        
        $student = Student::find($id);

        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->course = $request->course;
        $student->save();

    }

    // delete student record (permanent)
    public function delete($id){
        Student::find($id)->delete();
    }
}
