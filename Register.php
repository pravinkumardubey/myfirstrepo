<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table='users';
    protected $fillable = ['name','dob','email','password','contact','city'];

    public static function saveUser($request)
    {

       $data = [ 
       	'name'=>$request->input('name'),
        'dob'=>$request->input('dob'),
        'email'=>$request->input('email'),
        'password'=>bcrypt($request->input('password')),
        'contact'=>$request->input('mobile'),
        'city' => 'kanpur'
    	];

         $query = Self::create($data);
        return $query;

    }

    public static function getUser()
    {
    	$query = Self::all();
        return $query;
    }
}
