<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Information;
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
        DB::table('participations')->insert([
            'cne'=> $user,
            'id_formation'=>$idFormation
        ]);
        return response()->json([
            'message'=>$user.' a ete ajoute a la formation '.$idFormation,
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
        DB::table('formations')->find($id)->delete();
        return response()->json([
        'code'=>224,
            'message'=>'formation supprimée'
        ]);
    }
    // le controller pour les informations

    public function information_index(){
        $infos=Information::all();

        return response()->json([
            'infos'=>$infos
        ]);
    }
    public function store_information(Request $request){
        DB::table('formations')->insert(

            [
                'title'=>htmlspecialchars($request->input('title')),
                'describe'=>htmlspecialchars($request->input('describe')),
                'url_image'=>htmlspecialchars($request->input('url_image')),
            ]);
            return response()->json([
                'code'=>224,
                'message'=>'Infomation est ajoutée'
            ]);
    }

    public function update_information(Request $request,$id){
        DB::table('informations')->where('id',$id)->update([
            'title'=>htmlspecialchars($request->input('title')),
            'describe'=>htmlspecialchars($request->input('describe')),
        ]);
        return response()->json([
            'message'=>'information modifiee',
        ]);
    }

    public function information_show($id){
        $info=DB::table('informations')->where('id',$id)->first();

        return response()->json([
            'info'=>$info
        ]);
    }

    public function information_delete($id){
        DB::table('informations')->where('id',$id)->delete();

        return response()->json([
            'message'=>'info supprimee',
        ]);
    }
}