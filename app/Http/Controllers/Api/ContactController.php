<?php

namespace App\Http\Controllers\Api;

use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ContactController extends Controller
{
    public function index(Request $request){
        $contact= Contact::all();
        return response()->json(['success' => true, 'code' => '200', 'data' => $contact]);
    }
    public function postContact(Request $request){
      $validator = Validator::make($request->all(), [ 
        'userID' => 'required', 
        'mess' => 'required'
      ]);
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }
        //date('Y-m-d H:i:s')
        $contact = new Contact();
        
        $contact->userID=$request->userID;
        $contact->mess =$request->mess;
        $contact->time =$request->time;
    
        echo($contact);
        $contact->save();
        return response()->json(['success' => true, 'code' => 201]);
      }

    public function getId(Request $request, $id){
        $data= Contact::find((integer)$id);
        if($data==true){
          return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
        }else{
          return response()->json(['success' => false, 'code' => '404']);
        }
    }
    public function update(Request $request, $id){
      $validator = Validator::make($request->all(), [ 
        'userID' => 'required', 
        'mess' => 'required'
      ]);
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }
      $contact= Contact::find((integer)$id);
      $contact->userID=$request->userID;
      $contact->mess =$request->mess;
      $contact->time =$request->time;

      $contact->save();
      return response()->json(['success' => true, 'code' => 200]);
    }
    public function delete(Request $request, $id){
        $contact= Contact::find((integer)$id);
        $def = $contact->delete();
      if($def == true){
        return response()->json(['success' => true, 'code' => '200']);
      }else{
        return response()->json(['success' => true, 'code' => '400']);
      }
    }
    public function getParentUser(Request $request, $id){
      $data = Contact::find((integer)$id);
      if($data==true){
        return response()->json(['success' => true, 'code' => '200', 'data' => $data->user]);
      }else{
        return response()->json(['success' => false, 'code' => '404']);
      }
    }

}
