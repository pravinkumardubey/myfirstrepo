<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='likes';
    protected $fillable=['post_id','user_id','status'];

    public static function checkIfUserLiked($postId,$userId)
    {
    	$query = Self::where(['post_id'=>$postId,'user_id'=>$userId,'status'=>1])->first();
    	if ($query) {
    		return true;
    	}else{
    		return false;
    	}
    }

     public static function checkIfUserDisLiked($postId,$userId)
    {
    	$query = Self::where(['post_id'=>$postId,'user_id'=>$userId,'status'=>2])->first();
    	if ($query) {
    		return true;
    	}else{
    		return false;
    	}
    }

    public static function saveLike($postId,$userId)
    {
    	$data = ['post_id'=>$postId,'user_id'=>$userId,'status'=>1];

    	$query = Self::create($data);
    	return $query;
    }

     public static function removeLike($postId,$userId)
    {

    	$like = Self::where(['post_id'=>$postId,'user_id'=>$userId,'status'=>1]);
        return $like->delete();

    }


     public static function saveDisLike($postId,$userId)
    {
    	$data = ['post_id'=>$postId,'user_id'=>$userId,'status'=>2];

    	$query = Self::create($data);
    	return $query;
    }

     public static function removeDisLike($postId,$userId)
    {

    	$like = Self::where(['post_id'=>$postId,'user_id'=>$userId,'status'=>2]);
        return $like->delete();

    }


}
