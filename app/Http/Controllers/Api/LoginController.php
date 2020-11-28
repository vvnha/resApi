<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SessionUser;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Quotation;

class LoginController extends Controller
{
    public function login(Request $request)
    {
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
// token	refresh_token	token_expried	refresh_token_expried	user_id
    }
}