<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_teacher=Teacher::all();
        return response()->json([
            'status'=>224,
            'list_teacher'=>$list_teacher,
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
        $teacher=new Teacher();
        $teacher->first_name=htmlspecialchars($request->input('first_name')) ;
        $teacher->last_name=htmlspecialchars($request->input('last_name')) ;
        $teacher->email=htmlspecialchars($request->input('email')) ;
        $teacher->save();
        return response()->json([
            'status'=>224,
            'message'=>"Le professeur est bien ajouté !!!"
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
        $teacher=DB::table('teachers')->find($id);
        return response()->json([
            'status'=>224,
            'teacher'=>$teacher,
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
        DB::table('teachers')->where('teacher_id',$id)->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
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
        DB::table('teachers')->where('teacher_id',$id)->delete();
        return response()->json([
            'status'=>224,
            'message'=>"Le Professeur est supprimé"
        ]);
    }

    //authentification pour le professeur
    
}
