<?php

namespace App\Http\Controllers\Api;

use App\Model\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class OrderDetailController extends Controller
{
    public function index(Request $request){
        $data= OrderDetail::all();
        return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
    }
    public function postDetail(Request $request){
        //date('Y-m-d H:i:s')
        $validator = Validator::make($request->all(), [ 
          'orderID' => 'required', 
          'foodID' => 'required', 
          'qty'=> 'required',
          'price' => 'required'
        ]);
        if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
        }
        $orderDetail = new OrderDetail();
        
        $orderDetail->orderID=$request->orderID;
        $orderDetail->foodID =$request->foodID;
        $orderDetail->qty =$request->qty;
        $orderDetail->price =$request->price;
    
        echo($orderDetail);
        $orderDetail->save();
        return response()->json(['success' => true, 'code' => 201]);
      }

    public function getId(Request $request, $id){
        $data= OrderDetail::find((integer)$id);
        if($data==true){
          return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
        }else{
          return response()->json(['success' => false, 'code' => '404']);
        }
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [ 
          'orderID' => 'required', 
          'foodID' => 'required', 
          'qty'=> 'required',
          'price' => 'required'
        ]);
        if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
        }
        $orderDetail= OrderDetail::find((integer)$id);
        $orderDetail->orderID=$request->orderID;
        $orderDetail->foodID =$request->foodID;
        $orderDetail->qty =$request->qty;
        $orderDetail->price =$request->price;

        $orderDetail->save();
        return response()->json(['success' => true, 'code' => 200]);
    }
    public function delete(Request $request, $id){
        $data= OrderDetail::find((integer)$id);
        $def = $data->delete();
      if($def == true){
        return response()->json(['success' => true, 'code' => '200']);
      }else{
        return response()->json(['success' => true, 'code' => '400']);
      }
    }
    public function getParentOrder(Request $request, $id){
      $data = OrderDetail::find((integer)$id);
      if($data==true){
        return response()->json(['success' => true, 'code' => '200', 'data' => $data->order]);
      }else{
        return response()->json(['success' => false, 'code' => '404']);
      }
    }
    public function getChildFood(Request $request, $id){
      $data = OrderDetail::find((integer)$id);
      if($data==true){
        return response()->json(['success' => true, 'code' => '200', 'data' => $data->food]);
      }else{
        return response()->json(['success' => false, 'code' => '404']);
      }
    }
}
