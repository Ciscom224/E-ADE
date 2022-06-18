<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();

        return response()->json(Post::get());
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

        DB::table('posts')->insert([
            'container'=>htmlentities($request->input('container')),
            'sender'=>htmlentities($request->input('sender')),
        ]);
        return response()->json([
            'code'=>210,
            'message'=>'Votre message a ete poster',
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
        $post=DB::table('posts')->where('id',$id)->first();

        return response()->json([
            'post'=>$post,
            'code'=>210,
        ]);
    }

    /**
     * return all anwsers for a post $id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postAnwsers($id_post)
    {
        //
        $comments=DB::table('comments')->where('id_post',$id_post)->get();

        return response()->json([
            'code'=>201,
            'comments'=>$comments,
        ]);
    }
   // ansers for post
   public function anwser_post(Request $request){
    DB::table('comments')->insert([
        'anwser'=> htmlentities($request->input('anwser')),
        'id_post'=>htmlentities($request->input('id_post')),
        'owner'=> htmlentities($request->input('owner')),

    ]);
    return response()->json([
        'message'=>'commenter ajouter'
    ]);
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

        DB::table('posts')->where('id',$id)->delete();

        return response()->json([
            'code'=>210,
            'message'=> 'Votre message a ete supprimer'
        ]);

   }



}