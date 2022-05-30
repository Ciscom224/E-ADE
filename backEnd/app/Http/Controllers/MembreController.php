<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $membres=Membre::all();

        return response()->json([
            'code'=>210,
            'membres'=>$membres,
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
        DB::table('membres')->updateOrInsert(
            [
                'cne'=>htmlspecialchars($request->input('cne')),
            ],
            [
                'first_name'=>htmlspecialchars($request->input('first_name')),
                'last_name'=>htmlspecialchars($request->input('last_name')),
                'filiere'=>htmlspecialchars($request->input('filiere')),
                'level'=>htmlspecialchars($request->input('level')),
                'password'=>htmlspecialchars($request->input('password')),

            ]
            );
            return response()->json([
                'code'=>210,
                'message'=>'Votre demande a ete envoyer avec succes',
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
        $membre=DB::table('membres')->find($id);

        return response()->json([
            'code'=>210,
            'membre'=>$membre,
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
        DB::table('membres')->where('id',$id)->delete();
        return response()->json([
            'code'=>210,
            'message'=>'Ce membre a ete supprimer avec succes'
        ]);
    }
}
