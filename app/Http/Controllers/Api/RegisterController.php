<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
    	// dd("ok");


    	$validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'phone'=> 'required',
            'password' => 'required', 
            'c_password' => 'required|same:password', 
            'positionID' => 'required'
        ]);
		if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        // check tai khoan
     

    	$user = new User;
		$user->name=$request->name;
		$user->email =$request->email;
		$user->phone =$request->phone;
		$user->password =bcrypt($request->password);
		$user->positionID =$request->positionID;
		$user->save();
		return response()->json(['Success'=>'true', 'code' => '201']);
    }
}
