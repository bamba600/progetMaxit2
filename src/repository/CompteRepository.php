<?php
namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Compte;
use PDO;

       class CompteRepository extends AbstractRepository
       {
                private static ?CompteRepository $instance = null;
                private function __construct()
                {
                    parent::__construct(); // Call the parent constructor to initialize the PDO instance
                    // Private constructor to prevent direct instantiation
                    $this->table = 'compte'; // Set the table name for this repository
                }
                public static function getInstance(): CompteRepository
                {
                    if (self::$instance === null) {
                        self::$instance = new CompteRepository();
                    }
                    return self::$instance;
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
               public function findByUser( $user)
               {
                   $query = "SELECT * FROM {$this->table} WHERE idUtilisateur = :user_id";
                   $stmt = $this->pdo->prepare($query);
                   $stmt->execute([
                       ':user_id' => $user->getId()
                   ]);
                  $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   return array_map(fn($compte) => Compte::toObject($compte), $rows);
               }


       }

          