<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        if($students->count() > 0){
       
            return response()->json([
                'status' => 200,
                'student' => $students
            ], 200);
        }else{

             return response()->json([
                'status' => 404,
                'Messages' => "No  Records Found"
            ], 404);

        }
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:191',
            'lname' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'mobile' => 'required|digits:10',
        ]);

        if($validator->fails()){
        
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()

            ], 422);
        }else{

            $student = Student::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'course' => $request->course,
                'address' => $request->address,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ]);

            if($student){

                return response()->json([
                    'status' => 200,
                    'message' => "Student Created Successfully"
                ], 200);
            }else{

                return response()->json([
                    'status' => 500,
                    'message' => "Something went Wrong!!!"
                ], 500);
            }    
        }
    } 

    public function show($id)
    {
        $student = Student::find($id);
        if ($student){
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "No Student Found!!!"
            ], 404);
        }
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if ($student){
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "No Student Found!!!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:191',
            'lname' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'mobile' => 'required|digits:10',
        ]);

        if($validator->fails()){
        
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()

            ], 422);
        }else{

            $student = Student::find($id);
            if($student){

                $student ->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'course' => $request->course,
                    'address' => $request->address,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Student Updated Successfully"
                ], 200);
            }else{

                return response()->json([
                    'status' => 404,
                    'message' => "No Such Student Found!!!"
                ], 404);
            }    
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if($student){

            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => "Student Deleted Successfully!!!"
            ],200);
            
        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Such Student Found!!!"
            ],404);
        }
    }
}
