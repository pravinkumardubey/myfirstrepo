<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['name','type','status'];
    public static function addCategory($request){
	$category=[
        'name'=>$request->name,
        'type'=>$request->type,
        'status'=>1
    ];
    $query = Self::create($category);
    return $query;
    }
}
