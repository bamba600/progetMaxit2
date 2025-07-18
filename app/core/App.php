<?php

namespace App\Core;

use Symfony\Component\Yaml\Yaml;

// $deps : $dependencies
//$group : ex:core,service
//$name : ex:Database,session
//$className : ex:Database::class

class App{
    private static array $instancies = [];

    public static function getDependency(string $name){

    $deps =Yaml::parseFile(__DIR__.'/../config/Service.yml');

    if(array_key_exists($name,self::$instancies)){

            return self::$instancies[$name];
    }
    foreach($deps as $group){

        if(isset($group[$name])){

            $className = $group[$name];

            if(class_exists($group[$name])){
                    $instance = $className::getInstance();
                    if($instance){
                        self::$instancies[$name] = $instance;
                        return $instance;
                    }
            }
        }
        }
        return null;

    }

}































// $instancies;//systeme de cache des dependences