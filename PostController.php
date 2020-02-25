<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use DB;
class PostController extends Controller
{
    /**
     * The declare formGroup function use for Add description.
     *
     * @param [array] $request
     * @return redirect
     */
    function formGroup(Request $request){
        $category = Category::select('id')->where('name',$request->select)->first();
        $category_id=$category->id;
        $res = Post::addDescription($request,$category_id);
        if ($res) {
            return redirect()->route('bloblist');
        }
    }
    /**
     * The declare bloblist function use for view post list.
     *
     * @return view
     */
    function bloblist(){
    	$blob=DB::table('posts')->get();
    	return view('blob-list',['blob'=>$blob]);
    }
    /**
     * The declare deleteBlob function use for delete particular id
     *
     * @param [int] $id
     * 
     */
    function deleteBlob($id){
        $category=Post::find($id);
        $category->delete();
    }
    /**
     * The declare editBlob function use edit particular id
     *
     * @param [int] $id
     * @return view
     */
    function editBlob($id){
        $edit=DB::table('posts')->where('id',$id)->first();
        return view('edit_blob',['id'=>$edit]);
    }
    /**
     * The declare viewdesc function use for view post list. in this list user 
     * do edit and delete
     *
     * @return view
     */
    function viewdesc(){
        $desc=DB::table('posts')->orderByRaw('id DESC')->get();
        return view('description',['desc'=>$desc]);
    }

    /**
     * The declare update function use for update particular post
     *
     * @param [array] $request
     * @return view
     */

    function update(Request $request){
        //print_r($request->all());die();
        $id=$request->input('id');
        $name=$request->input('name');
        $type=$request->input('type');
        $select=$request->input('select');
        $id=$request->input('id');
        DB::table('posts')
            ->where('id', $id)
            ->update(['category_id' => $id,'title'=>$name,'description'=>$type]);
        return redirect()->route('bloblist');
    }
}
