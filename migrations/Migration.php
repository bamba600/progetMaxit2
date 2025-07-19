<?php

      namespace App\Migrations;
      
       use App\Core\App;

use PDO;

       class Migration
       {
              private PDO $pdo;
              private string $driver;

              public function __construct(PDO $pdo)
              {
                  $this->pdo = $pdo;
                  $this->driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
              }

              public function run()
              {
                   $this->createDatabase();
                   $this->createTables();
              }

              public function createDatabase()
              {
                  if ($this->driver === 'mysql') {
                      $this->pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
                      $this->pdo->exec("USE " . DB_NAME);
                  } 
              }

              public function createTables()
              {
                  // Implement table creation logic here
                  $sql=match($this->driver){
                      'mysql' => file_get_contents(__DIR__.'/../database/script_mysql.sql'),
                      'pgsql' => file_get_contents(__DIR__.'/../database/script_postgre.sql'),
                      'default' => throw new \Exception("Unsupported database driver: " . $this->driver)
                  };
                  $this->pdo->exec($sql);
            }
        }