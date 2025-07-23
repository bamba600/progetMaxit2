<?php
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();

// Déterminer le driver à utiliser (par défaut MySQL)
$driver = $_ENV['DB_DRIVER'] ?? 'mysql';

if ($driver === 'pgsql') {
    // Configuration PostgreSQL
    define('DB_DSN', $_ENV['PG_DB_DSN']);
    define('PASSWORD', $_ENV['PG_DB_PASS']);
    define('USER', $_ENV['PG_DB_USER']);
    define('DB_NAME', $_ENV['PG_DB_NAME']);
    define('BASE_DSN', 'pgsql:host=localhost;port=5432');
} else {
    // Configuration MySQL (par défaut)
    define('DB_DSN', $_ENV['DB_DSN']);
    define('PASSWORD', $_ENV['DB_PASS']);
    define('USER', $_ENV['DB_USER']);
    define('DB_NAME', $_ENV['DB_NAME']);
    define('BASE_DSN', $_ENV['BASE_DSN']);
}

define('DB_DRIVER', $driver);

