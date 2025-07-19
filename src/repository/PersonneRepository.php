<?php
namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Utilisateur;
use PDO;

       class PersonneRepository extends AbstractRepository
       {
                private static ?PersonneRepository $instance = null;
                private function __construct()
                {
                    parent::__construct(); // Call the parent constructor to initialize the PDO instance
                    // Private constructor to prevent direct instantiation
                }
                public static function getInstance(): PersonneRepository
                {
                    if (self::$instance === null) {
                        self::$instance = new PersonneRepository();
                    }
                    return self::$instance;
                }

                public function findByLogin(string $login)
                {
                    $query= "SELECT * FROM utilisateur WHERE login = :login";
                    $stmt = $this->pdo->prepare($query);
                    $stmt->execute([
                        ':login' => $login
                    ]);
                        

                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                   return $result ? Utilisateur::toObject($result) : null; // Return the user data or null if not found

                   

                }
                 public function selectAll()
               {

               }
                 public function insert($entity)
                 {

                 }
                public function update($entity)
                {

                }
               public function delete($entity)
               {

               }
            
       }