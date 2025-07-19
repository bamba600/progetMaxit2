<?php

namespace App\Core\Abstract;

use App\Core\App;

use PDO;

abstract class AbstractRepository {
    protected PDO $pdo;
    protected string $table;

    protected function __construct() {
        $this->pdo = App::getDependency('Database'); // Get the PDO instance from the App container
    }

    abstract public function selectAll();
    abstract public function insert($entity);
    abstract public function update($entity);
    abstract public function delete($entity);


   
}

   