<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Foods;
use Illuminate\Http\Request;
use Validator;


class FoodController extends Controller
{
  public function index(Request $request){
      $food = Foods::all();
      return response()->json(['success' => true, 'code' => 'ok', 'data' => $food]);
  }
  public function postFood(Request $request){
    //$foodName = $request->input('foodName'); 
    $validator = Validator::make($request->all(), [ 
      'foodName' => 'required', 
      'img' => 'required', 
      'rating'=> 'required',
      'hits' => 'required', 
      'parentID' => 'required'
    ]);
    if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()], 401);            
    }
    $food = new Foods();
    
		$food->foodName=$request->foodName;
		$food->img=$request->img;
		$food->price =$request->price;
    $food->rating =$request->rating;
    $food->hits =$request->hits;
    $food->ingres =$request->ingres;
    $food->parentID =$request->parentID;

    echo($food);
		$food->save();

    return response()->json(['success' => true, 'code' => 201]);
  }
  public function getFood(Request $request, $id){
    //$food = Foods::where('foodID', (integer)$id)->get();
    $data = Foods::find((integer)$id);
    if($data==true){
      return response()->json(['success' => true, 'code' => '200', 'data' => $data]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
  }
  public function update(Request $request, $id){
    $validator = Validator::make($request->all(), [ 
      'foodName' => 'required', 
      'img' => 'required', 
      'rating'=> 'required',
      'hits' => 'required', 
      'parentID' => 'required'
    ]);
    if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()], 401);            
    }
    $food = Foods::find((integer)$id);
    $food->foodName=$request->foodName;
		$food->img=$request->img;
		$food->price =$request->price;
    $food->rating =$request->rating;
    $food->hits =$request->hits;
    $food->ingres =$request->ingres;
    $food->parentID =$request->parentID;

		$food->save();
    return response()->json(['success' => true, 'code' => 'ok', 'data' => $food]);
  }
  public function delete(Request $request, $id){
    $food = Foods::find((integer)$id);
    $def = $food->delete();
    if($def == true){
      return response()->json(['success' => true, 'code' => '200']);
    }else{
      return response()->json(['success' => true, 'code' => '400']);
    }
  }
  public function getOneModel(Request $request, $id){
    $data = Foods::find((integer)$id);
    if($data==true){
      return response()->json(['success' => true, 'code' => '200', 'data' => $data->kindOfFood]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
  }
  public function getParentDetail(Request $request, $id){
    $data = Foods::find((integer)$id);
    if($data==true){
      return response()->json(['success' => true, 'code' => '200', 'data' => $data->detail]);
    }else{
      return response()->json(['success' => false, 'code' => '404']);
    }
  }
}