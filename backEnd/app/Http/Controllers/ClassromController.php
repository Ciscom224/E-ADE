<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Education;
use App\Models\Module;
use App\Models\Teacher;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassromController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_classroom=Classroom::all();
        foreach($list_classroom as $classroom){
            $education = Education::where('classroom_id',$classroom->classroom_id)->first();
            /*$classroom->teacher = Teacher::find($education->teacher_id);
            $classroom->module = Teacher::find($education->module_id);*/
            if($education !=null){
                $classroom->teacher = Teacher::where('teacher_id',$education->teacher_id)->first();
                $classroom->module = Module::where('module_id',$education->module_id)->first();
            }
        }
        return response()->json([
            'status'=>224,
            'list_classroom'=>$list_classroom,
        ]);
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
        //
        $classroom=new Classroom();
        $classroom->name=$request->input('name');
        $classroom->max_student=$request->input('max_student');
        $classroom->save();

        return response()->json([
            'status'=>224,
            'message'=>"La filliere est Ajouter !!!"
        ]);

    }
    public function AddTeacherTO(Request $request){
        $education = new Education();
        $education->classroom_id = $request->input('classroom_id');
        $education->module_id = $request->input('module_id');
        $education->teacher_id = $request->input('teacher_id');
        $education->save();
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
        $classroom=DB::table('classrooms')->find($id);
        return response()->json([
            'status'=>224,
            'classroom'=>$classroom,
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
        DB::table('classrooms')->where('classroom_id',$id)->update([
            'name'=>$request->input('name'),
            'max_student' =>$request->input('max_student')
        ]);

        return response()->json([
            'status'=>224,
            'message'=>"La filliere est modifiée !!!"
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
        DB::table('classrooms')->where('classroom_id', $id)->delete();
        return response()->json([
            'status'=>224,
            'message'=>"la filliere est supprimée"
        ]);
     
    }


}
