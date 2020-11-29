<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SessionUser;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Quotation;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	
		$validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }   
        $datachecklogin = [
    		'email'=>$request->email,
    		'password'=>$request->password
		];

    	if(Auth::attempt($datachecklogin)){
            // dd(Auth::attempt($datachecklogin));
    		$checkTokenExit= SessionUser::where('user_id', Auth::id())->first();
    		// dd($checkTokenExit);
    		if (empty($checkTokenExit)) {
    			$sessionuser = SessionUser::create([
    			'token' => Str::random(40),
    			'refresh_token'=> Str::random(40),
    			'token_expried'=> date('Y-m-d H:i:s', strtotime(' +30 day')),
    			'refresh_token_expried'=> date('Y-m-d H:i:s', strtotime(' +360 day')),
    			'user_id' => Auth::id()
    		]);
    		} else {
    					$sessionuser=$checkTokenExit;
                        $checkTokenExit->update([
                            'token' => Str::random(40),
                            'refresh_token'=> Str::random(40),
                            'token_expried'=> date('Y-m-d H:i:s', strtotime(' +30 day')),
                            'refresh_token_expried'=> date('Y-m-d H:i:s', strtotime(' +360 day'))
                        ]);
    				}	
    	} else {
    		return response()->json([
	    		'data' => 'Sai email hoac password',
	    		'code'=> '400'	    		
    	]);
    	}
    	return response()->json([
	    		'code' => '200',
	    		'data' => $sessionuser	    		
    	]);
	}
	
	public function token(Request $request)
    {
        $checkToken = SessionUser::where('token', $request->token)->where('user_id', $request->user_id)->first(); 
        if (empty($checkToken)) {
            return response()->json([
                'code' => '200',
                'data' => false      
        ]);
        }else{
            $name = User::select('name','email','phone','positionID')->where('id', $request->user_id)->first();
            return response()->json([
                'code' => '200',
                'data' => $name      
            ]);
        }
       
    }
}