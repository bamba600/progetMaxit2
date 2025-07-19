<?php

use App\Core\Database;
use App\Core\Session;
use App\Repository\PersonneRepository;
use App\Repository\CompteRepository;
use App\Repository\TransactionRepository;
use App\Service\SecurityService;
use App\Service\CompteService;
use App\Service\TransactionService;


$dependencies = [
    'core' => [
        "Database" => Database::class,
        "Session" => Session::class
    ],
    'service' => [
        "SecurityService" => SecurityService::class,
        "CompteService" => CompteService::class,
        "TransactionService" => TransactionService::class
    ],
    'repository' => [
        "PersonneRepository" => PersonneRepository::class,
        "CompteRepository" => CompteRepository::class,
        "TransactionRepository" => TransactionRepository::class
    ],

];
return $dependencies;