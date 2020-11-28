<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Foods;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function index(Request $request){
      $data = User::all();
      return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
  }
  public function postUser(Request $request){
    $validator = Validator::make($request->all(), [ 
      'name' => 'required', 
      'email' => 'required|email', 
      'phone'=> 'required',
      'password' => 'required', 
      'positionID' => 'required'
    ]);
    if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()], 401);            
    }
    $user = new User();
		$user->name=$request->name;
		$user->email=$request->email;
		$user->phone=$request->phone;
    $user->password =bcrypt($request->password);
    $user->positionID =$request->positionID;

    echo($user);
		$user->save();

    return response()->json(['success' => true, 'code' => 201]);
  }
  public function getId(Request $request, $id){
    $data = User::find((integer)$id);
    if($data==true){
      return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
  }
  public function update(Request $request, $id){
    $validator = Validator::make($request->all(), [ 
      'name' => 'required', 
      'email' => 'required|email', 
      'phone'=> 'required',
      'password' => 'required', 
      'positionID' => 'required'
  ]);
  if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()], 401);            
  }
    $user = User::find((integer)$id);
    $user->name=$request->name;
		$user->email=$request->email;
		$user->phone =$request->phone;
    $user->password =bcrypt($request->password);
    $user->positionID =$request->positionID;

		$user->save();
    return response()->json(['success' => true, 'code' => 200]);
  }
  public function delete(Request $request, $id){
    $data = User::find((integer)$id);
    $def = $data->delete();
    if($def == true){
      return response()->json(['success' => true, 'code' => '200']);
    }else{
      return response()->json(['success' => true, 'code' => '400']);
    }
  }
  public function getOneModel(Request $request, $id){
    $data = User::find((integer)$id);
    if($data==true){
      return response()->json(['success' => true, 'code' => '200', 'data' => $data->position]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
  }
  public function getChildContact(Request $request, $id){
    $data = User::find((integer)$id);
    if($data==true){
      return response()->json(['success' => true, 'code' => '200', 'data' => $data->contact]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
  }
  public function getChildOrder(Request $request, $id){
    $data = User::find((integer)$id);
    if($data==true){
      return response()->json(['success' => true, 'code' => '200', 'data' => $data->orderTable]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
  }
  public function getChildFood(Request $request, $id){
    $data = User::find((integer)$id);
    if($data==true){
      foreach($data->foodList as $food){
        $name = Foods::find((integer)$food->foodID)->foodName;
        $food ->foodName = $name;
      }
      return response()->json(['success' => true, 'code' => '200', 'data' => $data->foodList]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
    
  }
}