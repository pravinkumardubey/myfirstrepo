<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function handle($request, Closure $next){
    	if (\Session::has('local')) {
    		\App\setLocale(\Session::get('locale'));

    	}
    	return $next($request);  
    }
}
