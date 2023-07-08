<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
   public function showAll()
   {
       return view('students.index');
   }

   public  function index(){
    $student=Student::all();
    
     if($student->count()>0){
        return response()->json([
            'status'=>200,
            'student'=>$student
        ],200);        
     }else{
        return response()->json([
            'status'=>404,
            'status_message'=>'no records found'
        ],404);
     }
   }
   public  function store(Request $request){
      $validateData = Validator::make($request->all(), [
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:users',
         'password' => 'required|min:8',
         'course' => 'required|in:Maths, Science,Social,Tamil,English',
     ]);
     if($validateData->fails()){
         return response()->json([
            'status'=>422,    
            'errors'=>$validateData->messages()
         ]);
     }else{
      $student=Student::create([
         'name' => $request->name,
         'email' =>$request->email,
         'password' => $request->password,
         'course' => $request->course,
      ]);
     if($student){
      return response()->json([
         'status_message'=>"Success saved",
         'status'=>200
        ]);
     }else{
      return response()->json([
         'status_message'=>"not Success saved",
         'status'=>500
        ]);
     }
     }
     
}
public function show($id){
$student=Student::find($id);
  if($student){
   return response()->json([
      'status'=>"200",
      'student'=>$student
     ],200);
   }else{
   return response()->json([
      'status'=>404,
      'message'=>"no student found !"
     ],404);
}
}
public  function update(Request $request,$id){
   $validateData = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
      'course' => 'required|in:Maths, Science,Social,Tamil,English',
  ]);
  if($validateData->fails()){
      return response()->json([
         'status'=>422,    
         'errors'=>$validateData->messages() 
      ]);
  }else{
   $student=Student::find($id);
  if($student){
   $student->update([
      'name' => $request->name,
      'email' =>$request->email,
      'password' => $request->password,
      'course' => $request->course,
   ]);
   return response()->json([
      'status_message'=>"updated Success saved",
      'status'=>200
     ]);
  }else{
   return response()->json([
      'status_message'=>"no such student",
      'status'=>500
     ]);
  }
  }
  
}
public function destroy($id){
   $student=Student::find($id);
     if($student){
      $student->delete();
      return response()->json([
         'status'=>200,
         'message'=>"student has deleted successfully!"
        ],200);
      
      }else{
         return response()->json([
            'status'=>404,
            'message'=>"no student found !"
           ],404);
   }
   }
}