<?php
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();
define('DB_DSN',$_ENV['DB_DSN']);
define('PASSWORD',$_ENV['DB_PASS']);
define('USER',$_ENV['DB_USER']);

