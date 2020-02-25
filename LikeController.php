<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Like;
use App\Post;
use DB;
class LikeController extends Controller
{
	
/**
     * The decoded performLikeDislike function for the for like dislike user.
     *
     * @param [int] $postId
     * @param [int] $action
     * @return json
     */

    public function performLikeDislike($postId,$action)
    {

    		$userId = Auth::user()->id; 
    		$totalLikesCount = Post::getTotalLikeCount($postId);
    		$totalDisLikesCount = Post::getTotalDisLikeCount($postId);

    		$checkIfUserLiked = Like::checkIfUserLiked($postId,$userId);
    		$checkIfUserDisLiked = Like::checkIfUserDisLiked($postId,$userId);

    		if ($action == '1') {

    			if ($checkIfUserLiked) {
    				Like::removeLike($postId,$userId);
    				$newLikeCount = (($totalLikesCount!=0?$totalLikesCount-1:$totalLikesCount));
    				$newDislikeCount = $totalDisLikesCount;

    			}else if(!$checkIfUserLiked && !$checkIfUserDisLiked){

    				$newDislikeCount = $totalDisLikesCount;
    				$newLikeCount = $totalLikesCount+1;
    				Like::saveLike($postId,$userId);
    			}
    			else if (!$checkIfUserLiked && $checkIfUserDisLiked) {

    				Like::removeDisLike($postId,$userId);
    				Like::saveLike($postId,$userId);

    				$newDislikeCount = (($totalDisLikesCount!=0?$totalDisLikesCount-1:$totalDisLikesCount));
    				$newLikeCount = $totalLikesCount+1;
    			}
    			
    		}else if ($action == '2') {

    			if ($checkIfUserDisLiked) {

    				Like::removeDisLike($postId,$userId);

    				$newDislikeCount = (($totalDisLikesCount!=0?$totalDisLikesCount-1:$totalDisLikesCount));

    				$newLikeCount = $totalLikesCount;

    			}else if(!$checkIfUserLiked && !$checkIfUserDisLiked){

    				$newDislikeCount = $totalDisLikesCount+1;
    				$newLikeCount = $totalLikesCount;
    				Like::saveDisLike($postId,$userId);
    			}
    			else if ($checkIfUserLiked && !$checkIfUserDisLiked) {

    				Like::removeLike($postId,$userId);
    				Like::saveDisLike($postId,$userId);

    				$newLikeCount = (($totalLikesCount!=0?$totalLikesCount-1:$totalLikesCount));
    				$newDislikeCount = $totalDisLikesCount+1;
    			}
    		}

    		Post::updateNewLikeDislikeCount($postId,$newLikeCount,$newDislikeCount);

    		return response()->json([
    				'likeCount'=>$newLikeCount,'disLikeCount'=>$newDislikeCount,'postId'=>$postId
    		]);

    }



    
   /* public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }*/
}
