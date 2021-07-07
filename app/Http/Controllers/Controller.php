<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function add(Request $request){
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $exist = User::where('email',$request->email)->first();

        if ($exist==null){
            $user->save();
            return response()->json('The user was succesfully added');
        }

        else {
            return response()->json('This email aldready exists');
        };
    }

    public function connect(Request $request){
        $user = User::where('email',$request->email)->first();
        if($user==null){
            return response()->json('Wrong email or password');

        }
        else{
        if($user->password == $request->password){
            return response()->json($user->name);
        }
        else{
            return response()->json('Wrong email or password');
        }}
    }
}
