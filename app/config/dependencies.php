<?php

use App\Core\Database;
use App\Core\Session;
use App\Repository\PersonneRepository;
use App\Service\SecurityService;


$dependencies = [
    'core' => [
        "Database" => Database::class,
        "Session" => Session::class
    ],
    'service' => [
        "SecurityService" => SecurityService::class
    ],
    'repository' => [
        "PersonneRepository" => PersonneRepository::class
    ],

];
return $dependencies;