<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use Response;
use DB;
use Session;
use App\Register;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * The declare index function use for do user registration
     *
     * @param [array] $request
     * 
     */
    function index(Request $request){
        $save = Register::saveUser($request);
        if ($save) {
            echo "saved";
        }
    }

    /**
     * The declare validateLogin function use for the registration validation
     *
     * @param [array] $request
     * 
     */

    function validateLogin(Request $request){
        $data=array(
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        );
        $request->session()->put('user',$request->input('email'));
        if (Auth::attempt($data)) {
           

            return redirect()->route('dashboard');

        }
        else{
            echo "error";
        }   
    }

    public function dashboard()
    {
         $users = DB::table('users')->count();
            $category = DB::table('categories')->count();
            $description = DB::table('posts')->count();           
         return view('dashboard',['users'=>$users,'category'=>$category,'description'=>$description]);
    }

   /**
     * The declare logout function use for the user logout
     *
     * @return login view
     * 
     */


    protected function logout(Request $request)
    {
        return redirect()->route('login');
    }

     /**
     * The declare languages function use for the change language
     * @param [string] $local
     * @return  view
     * 
     */

    function languages($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    }
    
}
