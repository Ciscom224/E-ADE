<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\ExportStudent;
use Illuminate\Support\Facades\DB;
setlocale(LC_TIME, 'fr_FR.UTF8');

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_session=Session::all();
        return response()->json([
            'status'=>224,
            'list_module'=>$list_session,
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
    public function startSession(Request $request)
    {
        //
        $id = DB::table('sessions')->insertGetId(
            [
                'session_date' => date('Y-m-d'),
                'start_hour' => strftime('%H:%M'),
                'end_hour' => 0,
                'module_id' => htmlspecialchars($request->input('module_id')),
                'teacher_id' => htmlspecialchars($request->input('teacher_id')),
            ]
        );
        return response()->json([
            'status'=>224,
            'session_id'=>$id,
            'message'=>"La Session est bien ajouté !!!"
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
        $session=DB::table('sessions')->find($id);
        return response()->json([
            'status'=>224,
            'teacher'=>$session,
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
        DB::table('sessions')->where('session_id',$id)->update([
            'session_date'=>htmlspecialchars($request->input('session_date')),
            'start_hour'=>htmlspecialchars($request->input('start_hour')),
            'end_hour'=>htmlspecialchars($request->input('end_hour')),
            'module_id'=>htmlspecialchars($request->input('module_id')),
            'teacher_id'=>htmlspecialchars($request->input('teacher_id')),
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
        DB::table('sessions')->where('session_id',$id)->delete();
        return response()->json([
            'status'=>224,
            'message'=>"Le session est supprimé"
        ]);
    }

    public function checkStudent($classroom_id,$module_id,$student_id,$session_id){

        //checking if student get the permission to follow this module in this classrooom

        $checkIt=DB::table('classrooms')->where('classroom_id',$classroom_id)
                                        ->where('module_id',$module_id)
                                        ->where('student_id',$student_id)->first();
        if (!empty($checkIt)) {
           DB::table('session_students')->insert([
                'CIN'=>$student_id,
                'session_id'=>$module_id
           ]);
        }

    }
    public function studentPresentList($session_id){
        return Excel::download(new ExportStudent($session_id), 'presence.xlsx');
    }
}
