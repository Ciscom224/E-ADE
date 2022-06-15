<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
   
    public function logout (Request $request){
        //auth()->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();

        return [
            'message'=>'logged out succesfulley'
        ];
    }

    public function login (Request $request){


        $fields = $request->validate([
            'cne' => 'required|string',
            'password' => 'required|string',
            
            

        ]);

        //chec cne
        $membre = Membre::where('cne',$fields['cne'])->first();

        
        //chec password
        
        if(!$membre || !Hash::check($fields['password'],$membre->password )){
            return response([
                'message' => 'champ non convenable'
            ],401);
        }
           $membre->save();
       
                $token = $membre->createToken('montoken')->plainTextToken;
                $response = [
                    'membre' => $membre,
                    'token' => $token
                ];
                return response($response,201);
    }


}
