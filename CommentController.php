<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use DB;
class CommentController extends Controller
{

    /**
     * The declare saveComment function use for insert comment in database
     *
     */

    function saveComment()
    {
        $id=$_POST['postId'];
        $userid = Auth::user()->id;
        $msg=$_POST['commentMessage'];
       $save=new Comment([
        	'post_id'=>$id,
        	'user_id'=>$userid,
            'comment'=>$msg
        ]);
        $save->save();
        $user = DB::table('posts')->where('id',$id)->first();
        $comment=$user->comment;
        echo ++$comment;
        DB::table('posts')
            ->where('id', $id)
            ->update(['comment' => $comment]);
    } 
    /**
     * The decoded displayComment function use for comment display
     *
     * @param [int] $id
     * @return json
     */
    function displayComment($id){
        $comment=Comment::where('post_id',$id)->get();
        return response()->json(['comments'=>$comment]);
    }

     /**
     * The decoded deleteComment function use the for delete comment.
     *
     * @param [int] $id
     *
     */

    function deleteComment($id){
        $deleteid=Comment::find($id);
        $deleteid->delete();
    }
    /**
     * The decoded updateMessage function use for update comment
     *
     */
    function updateMessage(){
        $id=$_POST['id'];
        $updateMsg=$_POST['updateMsg'];
        Comment::where('id',$id)->update(['comment'=>$updateMsg]);
    }
}
