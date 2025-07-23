#!/usr/bin/env php
<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/config/env.php';

use App\Core\App;
use App\Migrations\Migration;

try {
    // Créer la connexion PDO avec BASE_DSN (sans spécifier la base de données)
    $pdo = new PDO(BASE_DSN, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connexion établie avec " . DB_DRIVER . "\n";
    
    // Exécuter les migrations
    $migration = new Migration($pdo);
    $migration->run();
    
    echo "Migrations exécutées avec succès !\n";
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage() . "\n";
    exit(1);
} catch (Exception $e) {
    echo "Erreur lors de la migration : " . $e->getMessage() . "\n";
    exit(1);
}
