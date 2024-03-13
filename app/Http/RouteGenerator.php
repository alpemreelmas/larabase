<?php

namespace App\Http;

class RouteGenerator
{
    const ROUTE_GENERATOR = "route_generator.php";
    public string $ROOT_ROUTE_CONFIG_FILE;
    public string $MODULE_PATH;
    public array $modules = [];
    public array $routes = [];

    public function __construct()
    {
        $this->MODULE_PATH = base_path("Modules");
        $this->ROOT_ROUTE_CONFIG_FILE = base_path().DIRECTORY_SEPARATOR."routes_config.json";;
    }

    public function run()
    {
        $this->getModules();
        $this->getRouteConfigFiles();
        $this->generateContentForRouteConfig();
        $this->generateHtmlForRoutes();
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
        foreach ($this->modules as $module){
            $path = $this->MODULE_PATH.DIRECTORY_SEPARATOR.$module;
            if(file_exists($path)){
                $filePath = $path.DIRECTORY_SEPARATOR.self::ROUTE_GENERATOR;
                if(file_exists($filePath)){
                    $this->routes[$module] = $this->getContentOfConfigFile($filePath);
                    continue;
                }
                throw new \Exception("Route generator file not found : ". self::ROUTE_GENERATOR. " in " . $filePath);
            }
            throw new \Exception("Module not found : ". $module);
        }
    }

    // TODO check this include keywords perfomance
    public function getContentOfConfigFile(string $path)
    {
        return include $path;
    }

    public function generateContentForRouteConfig(){
        if(!file_exists($this->ROOT_ROUTE_CONFIG_FILE)){
            $pointer = fopen($this->ROOT_ROUTE_CONFIG_FILE,"c+");
            fclose($pointer);
        }
        file_put_contents($this->ROOT_ROUTE_CONFIG_FILE,json_encode($this->routes));
    }

    public function getRootRouteConfigFile()
    {
        return json_decode(file_get_contents($this->ROOT_ROUTE_CONFIG_FILE),true);
    }

    public function getVariableForRouting(array|string $module, string $type)
    {
        $singleRouteVariable = [
            "{{ROUTE_NAME}}" => "",
            "{{ICON}}" => "",
            "{{ROUTE}}" => "",
            "{{PARENT_PERMISSION}}" => ""
        ];
        $nestedRoutesVariable = [
            "{{INDEX}}"=> null,
            "{{ROUTE_NAME}}"=> "",
            "{{ICON}}"=> "",
            "{{PARENT_PERMISSION}}" => "",
            "{{SUB_ROUTES}}" => []
        ];
        $nestedRouteVariable = [
            "{{SUB_ROUTE_PERMISSION}}" => "",
            "{{SUB_ROUTE}}" => "",
            "{{SUB_ROUTE_NAME}}" => ""
        ];

        if($type == "single"){
            $singleRouteVariable["{{ROUTE_NAME}}"] = $module["title"];
            $singleRouteVariable["{{ICON}}"] = $module["data-feather-icon"];
            $singleRouteVariable["{{ROUTE}}"] = $module["routes"];
            $singleRouteVariable["{{PARENT_PERMISSION}}"] = $module["permission"];
            $variables = $singleRouteVariable;
        }else if($type == "nested"){
            $nestedRoutesVariable["{{INDEX}}"] = $module["index"];
            $nestedRoutesVariable["{{ROUTE_NAME}}"] = $module["title"];
            $nestedRoutesVariable["{{ICON}}"] = $module["data-feather-icon"];
            $nestedRoutesVariable["{{PARENT_PERMISSION}}"] = $module["permission"];
            foreach ($module["routes"] as $key => $value){
                $currentNestedRoute= $nestedRouteVariable;
                if(is_array($value)){
                    $currentNestedRoute["{{SUB_ROUTE_PERMISSION}}"] = $value["permission"];
                    $currentNestedRoute["{{SUB_ROUTE}}"] = $value["route"];
                    $currentNestedRoute["{{SUB_ROUTE_NAME}}"] = $value["title"];
                }elseif(is_string($value)){
                    $currentNestedRoute["{{SUB_ROUTE_PERMISSION}}"] = $module["permission"];
                    $currentNestedRoute["{{SUB_ROUTE}}"] = $value;
                    $currentNestedRoute["{{SUB_ROUTE_NAME}}"] = $key;
                }
                array_push($nestedRoutesVariable["{{SUB_ROUTES}}"], $currentNestedRoute);
            }
            $variables = $nestedRoutesVariable;
        }
        return $variables;
    }

    public function getRouteForModuleStub($index, array $module)
    {
        if(!$module["permission"]){
            throw new \Exception("Please provide general permission");
        }
        $module["index"] = $index;
        $routesType = is_array($module["routes"]) ? "nested" : "single";
        return [$routesType,$this->getVariableForRouting($module,$routesType)];
    }

    public function generateHtmlForRoutes(){
        $routes = $this->getRootRouteConfigFile();
        $routesHtml = "";
        foreach ($routes as $index => $module){
            $routesHtml.="\n".$this->generateStubs($this->getRouteForModuleStub($index,$module));
        }
        file_put_contents(resource_path("views/admin/layouts/routes.blade.php"),$routesHtml);
    }

    // TODO rename function name. This is not the aim of the function
    public function generateStubs(array $array)
    {
        $type = $array[0];
        $variables = $array[1];
        if($type == "nested"){
            $subRouteHtml = "";
            foreach ($variables["{{SUB_ROUTES}}"] as $subRoute){
                $subRouteHtml.="\n".$this->generateFromStub(array_keys($subRoute),array_values($subRoute),"nested-single");
            }
            $variables["{{SUB_ROUTES}}"] = $subRouteHtml;
        }
        return $this->generateFromStub(array_keys($variables),array_values($variables),$type);
    }

    public function generateFromStub($keys, $values,$type)
    {
        return str_replace(
            $keys,
            $values,
            $this->getStub($type)
        );
    }

    public function getStub($type = "single")
    {
        $file = "";
        switch ($type) {
            case "single":
                $file = base_path('stubs/route_generator/single-route.stub');
                break;
            case "nested":
                $file = base_path('stubs/route_generator/nested-routes.stub');
                break;
            case "nested-single":
                $file = base_path('stubs/route_generator/nested-route.stub');
                break;
        }
        return file_get_contents($file);
    }
}
