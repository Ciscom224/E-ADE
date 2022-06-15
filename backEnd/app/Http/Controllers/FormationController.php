<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $formations=Formation::all();

        return response()->json([
            'formations'=>$formations,
            'code'=>224
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
        DB::table('formations')->updateOrInsert(
            [
                'id_formation'=>htmlspecialchars($request->input('id_formation')),
                'subject'=>htmlspecialchars($request->input('subject')),
            ],
            [
                'teacher'=>htmlspecialchars($request->input('teacher')),
                'limit_number'=>htmlspecialchars($request->input('limit_number')),
                'is_certificat'=>htmlspecialchars($request->input('is_certificat')),
                'description'=>htmlspecialchars($request->input('description')),
                'url_image'=>htmlspecialchars($request->input('url_image')),
                'dat_e'=>htmlspecialchars($request->input('dat_e')),

            ]);
            return response()->json([
                'code'=>224,
                'message'=>'Formation est ajoutée'
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
        $formation=DB::table('users')->where('id',$id)->first();

        return response()->json([
            'formation'=>$formation,
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
        //DB::table('formations')->find($id)->update()
    }

    //--------------funtion for add user in a formation---
    public function addUserFormation($idFormation,$user)
    {

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
        DB::table('formations')->find($id)->delete();
        return response()->json([
        'code'=>224,
            'message'=>'formation supprimée'
        ]);
    }
}