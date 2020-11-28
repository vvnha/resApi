<?php

namespace App\Http\Controllers\api;

use App\Model\OrderTb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Foods;
use Validator;

class OrderTbController extends Controller
{
    public function index(Request $request){
        $data= OrderTb::all();
        return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
    }
    public function postTb(Request $request){
        //date('Y-m-d H:i:s')
        $validator = Validator::make($request->all(), [ 
          'userID' => 'required', 
          'total' => 'required', 
          'orderDate'=> 'required',
          'perNum' => 'required', 
          'service' => 'required',
          'dateClick' =>'required'
      ]);
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }

        $orderTable = new OrderTb();
        
        $orderTable->userID=$request->userID;
        $orderTable->total =$request->total;
        $orderTable->orderDate =$request->orderDate;
        $orderTable->perNum =$request->perNum;
        $orderTable->service =$request->service;
        $orderTable->dateClick =$request->dateClick;
    
        echo($orderTable);
        $orderTable->save();
        return response()->json(['success' => true, 'code' => 201]);
      }

      public function getId(Request $request, $id){
        $data= OrderTb::find((integer)$id);
        if($data==true){
          return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
        }else{
          return response()->json(['success' => false, 'code' => '404']);
        }
    }
    public function update(Request $request, $id){
      $validator = Validator::make($request->all(), [ 
        'userID' => 'required', 
        'total' => 'required', 
        'orderDate'=> 'required',
        'perNum' => 'required'
    ]);
    if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()], 401);            
    }
        $orderTable = OrderTb::find((integer)$id);
        
        $orderTable->userID=$request->userID;
        $orderTable->total =$request->total;
        $orderTable->orderDate =$request->orderDate;
        $orderTable->perNum =$request->perNum;
        $orderTable->service =$request->service;
        $orderTable->dateClick =$request->dateClick;
    
        echo($orderTable);
        $orderTable->save();
        return response()->json(['success' => true, 'code' => 200]);
    }
    public function delete(Request $request, $id){
        $data = OrderTb::find((integer)$id);
        $def = $data->delete();
        if($def == true){
          return response()->json(['success' => true, 'code' => '200']);
        }else{
          return response()->json(['success' => true, 'code' => '400']);
        }
    }
    public function getParentUser(Request $request, $id){
      $data = OrderTb::find((integer)$id);
      if($data==true){
        return response()->json(['success' => true, 'code' => '200', 'data' => $data->user]);
      }else{
        return response()->json(['success' => false, 'code' => '404']);
      }
    }
    public function getChildDetail(Request $request, $id){
      $data = OrderTb::find((integer)$id);
      foreach($data->detail as $food){
        $name = Foods::find((integer)$food->foodID)->foodName;
        $food ->foodName = $name;
      }
      if($data==true){
        return response()->json(['success' => true, 'code' => '200', 'data' => $data->detail]);
      }else{
        return response()->json(['success' => false, 'code' => '404']);
      }
    }
}
