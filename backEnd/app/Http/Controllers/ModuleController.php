<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_module=Module::all();
        return response()->json([
            'status'=>224,
            'list_module'=>$list_module,
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
        $module=new Module();
        $module->name=htmlspecialchars($request->input('name'));
        $module->save();
        return response()->json([
            'status'=>224,
            'message'=>"Le Module est bien ajouté !!!"
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
        $module=DB::table('modules')->find($id);
        return response()->json([
            'status'=>224,
            'teacher'=>$module,
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
        DB::table('modules')->where('module_id',$id)->update([
            'name'=>$request->input('name'),
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
        DB::table('modules')->where('module_id',$id)->delete();
        return response()->json([
            'status'=>224,
            'message'=>"Le Module est supprimé"
        ]);
    }
}
