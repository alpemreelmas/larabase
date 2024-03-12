<?php

namespace App\Http;
use function Illuminate\Tests\Container\containerTestInject;

class RouteGenerator
{
    const ROUTE_GENERATOR = "route_generator.php";
    public string $MODULE_PATH;
    public array $modules = [];
    public array $routes = [];

    public function __construct()
    {
        $this->MODULE_PATH = base_path("Modules");
    }

    public function getModules()
    {
        if ($dirs = scandir($this->MODULE_PATH)) {
           foreach ($dirs as $dir){
               if($dir == "." || $dir == "..") continue;
               if(is_dir($this->MODULE_PATH.DIRECTORY_SEPARATOR.$dir)){
                   array_push($this->modules,$dir);
               }
           }
        }
        return $this->modules;
    }

    public function getRouteConfigFiles()
    {
        // you should move this function to the main one
        $this->getModules();
        foreach ($this->modules as $module){
            $path = $this->MODULE_PATH.DIRECTORY_SEPARATOR.$module;
            if(file_exists($path)){
                $filePath = $path.DIRECTORY_SEPARATOR.self::ROUTE_GENERATOR;
                if(file_exists($filePath)){
                    $this->routes[$module][] = $this->getContentOfConfigFile($filePath);
                }
                throw new \Exception("Route generator file not found : ". self::ROUTE_GENERATOR. " in " . $filePath);
            }
            throw new \Exception("Module not found : ". $module);
        }
        $this->generateContentForRouteConfig();
    }

    // TODO check this include keywords perfomance
    public function getContentOfConfigFile(string $path)
    {
        return include $path;
    }

    public function generateContentForRouteConfig(){
        // TODO implement
    }
}
