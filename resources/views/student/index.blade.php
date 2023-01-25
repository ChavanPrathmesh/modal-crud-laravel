@extends('layouts.app')

@section('content')

<div class="main">
    
    <!-- AddStudentModal Start -->
    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <form id="addForm" name="addForm">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="StudentForm">
                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="">First Name:</label>
                        <input type="text" id="student_fname" class="fname form-control" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="">Last Name:</label>
                        <input type="text" id="student_lname" class="lname form-control" name="lname" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" id="student_email" class="email form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone:</label>
                        <input type="text" id="student_phone" class="phone form-control" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="">Course:</label>
                        <input type="text" id="student_course" class="course form-control" name="course" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="AddStudentClose">Close</button>
                    <button type="submit" form="addForm" class="btn btn-primary add_student">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- AddStudentModal End -->

    <!-- ShowStudentModal Start -->
    <div class="modal fade" id="ShowStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Student Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">First Name:</label>
                    <input type="text" id="fname" class="fname form-control" disabled=True>
                </div>
                <div class="form-group">
                    <label for="">Last Name:</label>
                    <input type="text" id="lname" class="lname form-control" disabled=True>
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" id="email" class="email form-control" disabled=True>
                </div>
                <div class="form-group">
                    <label for="">Phone:</label>
                    <input type="text" id="phone" class="phone form-control" disabled=True>
                </div>
                <div class="form-group">
                    <label for="">Course:</label>
                    <input type="text" id="course" class="course form-control" disabled=True>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- ShowStudentModal End -->

    <!-- EditStudentModal Start -->
    {{-- <div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <form id="editForm" name="editForm">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <input type="hidden" id="student_id" class="id form-control">
                </div>
                <div class="form-group">
                    <label for="">First Name:</label>
                    <input type="text" id="student_fname" class="fname form-control">
                    @if ($errors->has('fname'))
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Last Name:</label>
                    <input type="text" id="student_lname" class="lname form-control" >
                    @if ($errors->has('lname'))
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" id="student_email" class="email form-control" >
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Phone:</label>
                    <input type="text" id="student_phone" class="phone form-control" >
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Course:</label>
                    <input type="text" id="student_course" class="course form-control" >
                    @if ($errors->has('course'))
                        <span class="text-danger">{{ $errors->first('course') }}</span>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="EditModalClose">Close</button>
                <button type="submit" form="editForm" class="btn btn-primary edit_student">Update</button>
            </div>
        </form>
            </div>
        </div>
    </div> --}}
    <!-- EditStudentModal End -->

    <!-- DeleteStudentModal Start -->
    <div class="modal fade" id="DeleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="">
                
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Student Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are You Sure, You want to delete this student record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary delete_student">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="DeleteStudentClose">NO</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    <!-- DeleteStudentModal End -->

    {{-- Main Content Start --}}
    <div class="container py-5" id="table">
        <div class="row">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            <div class="col-md-12 border pt-2 pb-2">
                Student 
                <button class="add btn btn-primary float-end" id="Add" data-bs-toggle="modal" data-bs-target="#AddStudentModal">Add Student</button>
            </div>
            <div class="col-md-12 border">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Student Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Course</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="student-data">
                        @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <th>{{$student->fname}}</th>
                            <th>{{$student->lname}}</th>
                            <th>{{$student->email}}</th>
                            <th>{{$student->phone}}</th>
                            <th>{{$student->course}}</th>
                            <th>
                                <button class="show btn btn-primary"  data-id="{{$student->id}}" data-fname="{{$student->fname}}" data-lname="{{$student->lname}}" data-email="{{$student->email}}" data-phone="{{$student->phone}}" data-course="{{$student->course}}" data-bs-toggle="modal" data-bs-target="#ShowStudentModal">Show</button>
                                <button class="add btn btn-warning " id="Edit" data-id="{{$student->id}}" data-fname="{{$student->fname}}" data-lname="{{$student->lname}}" data-email="{{$student->email}}" data-phone="{{$student->phone}}" data-course="{{$student->course}}" data-bs-toggle="modal" data-bs-target="#AddStudentModal">Edit</button>
                                <button class="delete btn btn-danger " data-id="{{$student->id}}" data-bs-toggle="modal" data-bs-target="#DeleteStudentModal">Delete</button>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$students->links()}}
    </div>
</div>
{{-- Main Content End --}}


@endsection

@section('scripts')
    <script src="{{asset('js/ajax.js')}}"></script>
    <script>
        
    </script>
@endsection