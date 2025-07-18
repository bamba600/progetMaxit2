<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../routes/route.web.php';
require_once __DIR__.'/../app/config/boostrap.php';



use App\Core\Router;
use Symfony\Component\Yaml\Yaml;

// $pdo= Database::getInstance();

//   $query=$pdo->prepare('SELECT * FROM utilisateur');
//     $query->execute();
//     $users = $query->fetchAll(PDO::FETCH_ASSOC);
//     var_dump($users);
//     exit;


Router::resolver();
    // $deps =Yaml::parseFile(__DIR__.'/../app/config/Service.yml');
    // var_dump($deps);
    // die();
