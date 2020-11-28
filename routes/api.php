<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function() {

    Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    Route::post('register','RegisterController@register');
    Route::post('login','LoginController@login');

    Route::get('/food', ['as' => 'food', 'uses' => 'FoodController@index']);
    Route::get('/food/parent/{id}', ['as' => 'food', 'uses' => 'FoodController@getOneModel']);
    Route::post('/food', ['as' => 'food', 'uses' => 'FoodController@postFood']);
    Route::get('/food/{id}',['as'=>'getFood','uses'=>'FoodController@getFood']);
    Route::put('/food/update/{id}',['as'=>'update','uses'=>'FoodController@update']);
    Route::delete('/food/delete/{id}',['as'=>'delete','uses'=>'FoodController@delete']);

    Route::get('/user', ['as' => 'user', 'uses' => 'UserController@index']);
    Route::get('/user/parent/{id}', ['as' => 'user', 'uses' => 'UserController@getOneModel']);
    Route::get('/user/getContact/{id}', ['as' => 'user', 'uses' => 'UserController@getChildContact']);
    Route::get('/user/getOrder/{id}', ['as' => 'user', 'uses' => 'UserController@getChildOrder']);
    Route::get('/user/getFood/{id}', ['as' => 'user', 'uses' => 'UserController@getChildFood']);
    Route::post('/user', ['as' => 'user1', 'uses' => 'UserController@postUser']);
    Route::get('/user/{id}',['as'=>'getID','uses'=>'UserController@getId']);
    
    Route::put('/user/update/{id}',['as'=>'update','uses'=>'UserController@update']);
    Route::delete('/user/delete/{id}',['as'=>'delete','uses'=>'UserController@delete']);

    Route::get('/posi', ['as' => 'posi', 'uses' => 'PositionController@index']);
    Route::get('/posi/child/{id}', ['as' => 'posi', 'uses' => 'PositionController@getModel']);
    
    Route::get('/kindoffood', ['as' => 'kindoffood', 'uses' => 'KindOfFoodController@index']);
    Route::get('/kindoffood/child/{id}', ['as' => 'kindoffood', 'uses' => 'KindOfFoodController@getModel']);

    Route::get('/order', ['as' => 'order', 'uses' => 'OrderTbController@index']);
    Route::post('/order', ['as' => 'order', 'uses' => 'OrderTbController@postTb']);
    Route::get('/order/{id}',['as'=>'getID','uses'=>'OrderTbController@getId']);
    Route::get('/order/getUser/{id}',['as'=>'getID','uses'=>'OrderTbController@getParentUser']);
    Route::get('/order/getDetail/{id}',['as'=>'getID','uses'=>'OrderTbController@getChildDetail']);
    Route::put('/order/update/{id}',['as'=>'update','uses'=>'OrderTbController@update']);
    Route::delete('/order/delete/{id}',['as'=>'delete','uses'=>'OrderTbController@delete']);

    Route::get('/orderDetail', ['as' => 'orderDetail', 'uses' => 'OrderDetailController@index']);
    Route::post('/orderDetail', ['as' => 'orderDetail', 'uses' => 'OrderDetailController@postDetail']);
    Route::get('/orderDetail/{id}',['as'=>'getID','uses'=>'orderDetailController@getId']);
    Route::get('/orderDetail/getOrder/{id}',['as'=>'getID','uses'=>'orderDetailController@getParentOrder']);
    Route::get('/orderDetail/getFood/{id}',['as'=>'getID','uses'=>'orderDetailController@getChildFood']);
    Route::put('/orderDetail/update/{id}',['as'=>'update','uses'=>'orderDetailController@update']);
    Route::delete('/orderDetail/delete/{id}',['as'=>'delete','uses'=>'orderDetailController@delete']);

    Route::get('/cmt', ['as' => 'cmt', 'uses' => 'CommentController@index']);
    Route::post('/cmt', ['as' => 'cmt', 'uses' => 'CommentController@postCmt']);
    Route::get('/cmt/{id}',['as'=>'getID','uses'=>'CommentController@getId']);
    Route::put('/cmt/update/{id}',['as'=>'update','uses'=>'CommentController@update']);
    Route::delete('/cmt/delete/{id}',['as'=>'delete','uses'=>'CommentController@delete']);

    Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
    Route::post('/contact', ['as' => 'contact', 'uses' => 'ContactController@postContact']);
    Route::get('/contact/getUser/{id}',['as'=>'getID','uses'=>'ContactController@getParentUser']);
    Route::get('/contact/{id}',['as'=>'getID','uses'=>'ContactController@getId']);
    Route::put('/contact/update/{id}',['as'=>'update','uses'=>'ContactController@update']);
    Route::delete('/contact/delete/{id}',['as'=>'delete','uses'=>'ContactController@delete']);

    Route::get('/abc', ['as' => 'abc', 'uses' => 'AbcController@index']);
    Route::post('/abc', ['as' => 'abc', 'uses' => 'AbcController@postAbc']);
});