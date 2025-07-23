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
                   // Reconnect to the specific database after creating it
                   $this->reconnectToDatabase();
                   $this->createTables();
              }

              public function createDatabase()
              {
                  if ($this->driver === 'mysql') {
                      $this->pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
                      echo "Database " . DB_NAME . " created or already exists.\n";
                  } 
              }

              private function reconnectToDatabase()
              {
                  if ($this->driver === 'mysql') {
                      // Reconnect to the specific database
                      $this->pdo = new PDO(DB_DSN, USER, PASSWORD);
                      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      echo "Reconnected to database " . DB_NAME . "\n";
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