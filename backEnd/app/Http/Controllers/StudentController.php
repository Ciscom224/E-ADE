<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_students=Student::all();

        return response()->json([
            'status'=>224,
            'list_student'=>$list_students,
        ]);
    }

    public function nonValidatedStudents(){
        $students = Student::where('validation',false)->get();
        foreach($students as $student){
            $student->classroom = Classroom::where('classroom_id',$student->classroom_id)->first();
        }
        return response()->json([
            'status'=>224,
            'students'=>$students,
        ]);
    }

    public function valider($cin){
        $student = Student::where('cin',$cin)->get()[0];
        $student->validation = true;
        return response($student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add student function
        $request->validate([
            'image' => 'required| mimes: jpg,png,jpeg,path',
            'first_name' => "required ",
            'last_name'=>'required',
            'classroom_id'=>'required',
            'cin'=>'required'
        ]);
        $path = 'images';
        $image_name = $request->image->GetClientOriginalName();
        $request->image->move($path, $image_name);
        $student=new Student();
        $student->CIN=htmlspecialchars($request->input('cin')) ;
        $student->first_name=htmlspecialchars($request->input('first_name')) ;
        $student->last_name=htmlspecialchars($request->input('last_name')) ;
        $student->classroom_id=htmlspecialchars($request->input('classroom_id'));
        $student->image = $image_name;
        $student->save();
        return response()->json([
            'status'=>224,
            'message'=>"L'étudiant est bien ajouté !!!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student=DB::table('students')->find($id);
        return response()->json([
            'status'=>224,
            'student'=>$student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

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
        //
        DB::table('students')->where('CIN',$id)->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'classroom_id'=>$request->input('classroom_id'),
        ]);

        return response()->json([
            'status'=>224,
            'message'=> "Modification recue !!!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('students')->where('CIN',$id)->delete();
        return response()->json([
            'status'=>224,
            'message'=>"Suppression recue"
        ]);
    }
}
