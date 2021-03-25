<?php

use Illuminate\Support\Str;
  
if(!function_exists("get_title")){

    function get_title(){

        $url = url()->current();
        if( Str::contains($url, 'login') ){
    
            return trans('dashboard.login');
    
        }else if( Str::contains($url, 'register') ){
    
            return trans('dashboard.register');
    
        }
    
    }

}


if(!function_exists("admin")){

    function admin(){
        return auth()->guard('admin');
    }

}

