<?php

/*TODO: make a control convention namings of the functions */

if(!function_exists("authMiddlewareGenerator")){
    function authMiddlewareGenerator(array $middlewares = [],$verified=false)
    {
        if(module_exist("User")){
            $auth = ["auth"];
            $verified == true ? array_push($auth,"verified") : null;
            array_push($middlewares,...$auth );
        }
        return $middlewares;
    }
}

if(!function_exists("getUserModelPath")){
    function getUserModelPath()
    {
        return module_exist("User") ? \Modules\User\App\Models\User::class : null;
    }
}

if(!function_exists("module_exist")){
    function module_exist(string $name)
    {
        $modulePath = base_path("Modules".DIRECTORY_SEPARATOR.$name);
        if(file_exists($modulePath)){
            return true;
        }
        return false;
    }
}
