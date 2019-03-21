<?php

namespace App\Core;


class Request 

{

    public static function uri() 
    
    {

        $dir = dirname($_SERVER['PHP_SELF']);
        
        return trim(
            substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 
            strlen($dir) 
            + 1), '/');


       //parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    }


    public static function method() 
    
    {

        return $_SERVER['REQUEST_METHOD'];

    }

}