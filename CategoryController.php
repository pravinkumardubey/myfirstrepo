<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Response;
use DB;
class CategoryController extends Controller
{
    /**
     * The declare index function use for category display
     *
     * @return view
     */
    function index(){
        $category=DB::table('categories')->get();
    	return view('show',['category'=>$category]);
    }

    /**
     * The declare addCategory function use for category add
     *
     * @return view
     */

    function addcategory(){
    	return view('category');
    }

    /**
     * The declare addingcategory function use for category insert in DATABASE
     *
     * @return view
     */

    function addingcategory(Request $request){
        $res = Category::addCategory($request);
        if ($res) {
            return view('category');
        }
    }


    /**
     * The declare blobs function use for view post details 
     *
     * @return view
     */

    function blobs(){
            return view('add');
    }

    /**
     * The declare selecttype function use for category select autocomplete
     *
     * @return data
     */

    function selecttype(Request $request){
        $type=$request->input('type');
    	$myquery = DB::table('categories')->select('name')->where('type','=',$type)->get();
   		return $myquery;
    }

    /**
     * The declare deleteRecord function use for delete category
     *
     */

    function deleteRecord($id){
        $category=Category::find($id);
        $category->delete();
    }
}
