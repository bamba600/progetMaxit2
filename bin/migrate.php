#!/usr/bin/env php
<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/config/env.php';

use App\Core\App;
use App\Migrations\Migration;

$pdo = new PDO(BASE_DSN, USER, PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$migration = new Migration($pdo);
$migration->run();
