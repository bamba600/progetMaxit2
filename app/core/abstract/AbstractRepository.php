<?php

namespace App\Core\Abstract;

use App\Core\App;

use PDO;

abstract class AbstractRepository {
    protected PDO $pdo;

    protected function __construct() {
        $this->pdo = App::getDependency('Database'); // Get the PDO instance from the App container
    }



}

   