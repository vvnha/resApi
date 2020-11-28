<?php

namespace App\Http\Controllers\Api;

use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CommentController extends Controller
{
    public function index(Request $request){
        $cmt= Comment::all();
        return response()->json(['success' => true, 'code' => '200', 'data' => $cmt]);
    }
    public function postCmt(Request $request){
      $validator = Validator::make($request->all(), [ 
        'userID' => 'required', 
        'userName' => 'required', 
        'mess'=> 'required',
        'foodID'=> 'required'
      ]);
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }
      //date('Y-m-d H:i:s')
      $cmt = new Comment();
      
      $cmt->userID=$request->userID;
      $cmt->userName =$request->userName;
      $cmt->mess =$request->mess;
      $cmt->time =$request->time;
      $cmt->foodID=$request->foodID;
  
      echo($cmt);
      $cmt->save();
      return response()->json(['success' => true, 'code' => 201]);
    }

    public function getId(Request $request, $id){
        $data= Comment::find((integer)$id);
        if($data==true){
          return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
        }else{
          return response()->json(['success' => false, 'code' => '404']);
        }
    }
    public function update(Request $request, $id){

      $validator = Validator::make($request->all(), [ 
        'userID' => 'required', 
        'userName' => 'required', 
        'mess'=> 'required',
        'foodID'=> 'required'
      ]);
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }
        $cmt= Comment::find((integer)$id);
        $cmt->userID=$request->userID;
        $cmt->userName =$request->userName;
        $cmt->mess =$request->mess;
        $cmt->time =$request->time;
        $cmt->foodID=$request->foodID;

        $cmt->save();
        return response()->json(['success' => true, 'code' => 200]);
    }
    public function delete(Request $request, $id){
        $cmt= Comment::find((integer)$id);
        $def = $cmt->delete();
      if($def == true){
        return response()->json(['success' => true, 'code' => '200']);
      }else{
        return response()->json(['success' => true, 'code' => '400']);
      }
    }
}
