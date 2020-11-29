<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $guarded = [];
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected function position(){
        return $this->belongsTo('App\Model\Position','positionID');
    }
    protected function contact(){
        return $this->hasMany('App\Model\Contact','userID');
    }
    protected function orderTable(){
        return $this->hasMany('App\Model\OrderTb','userID');
    }
    protected function foodList(){
        return $this->hasManyThrough('App\Model\OrderDetail','App\Model\OrderTb','userID','orderID','id');
    }

}
