<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Abc;
use Illuminate\Http\Request;


class AbcController extends Controller
{
    public function index(Request $request){
      $food = Abc::all();
    return response()->json(['success' => true, 'code' => 'ok', 'data' => $food]);
  }
  public function postAbc(Request $request){
    //$foodName = $request->input('foodName'); 
    $food = new Abc();
    $food->foodName=$request->foodName;
    echo $food;
	$food->save();

    return response()->json(['success' => true, 'code' => 201]);
}



}