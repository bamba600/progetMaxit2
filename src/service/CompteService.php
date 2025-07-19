<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Compte;
use App\Entity\Utilisateur;
use App\Repository\CompteRepository;

class CompteService
{
    private  CompteRepository $compteRepository;

        private static ?CompteService $instance = null;
        private CompteService $personneRepository;

        private function __construct()
        {
            // Private constructor to prevent direct instantiation
            // Get the CompteRepository instance from the App container
            $this->compteRepository = App::getDependency('CompteRepository'); // Get the CompteRepository instance from the App container
              
        }
    
        public static function getInstance(): CompteService
        {
            if (self::$instance === null) {
                self::$instance = new CompteService();
            }
            return self::$instance;
        }

    //   public function findById(int $id): ?Compte
    //     {
    //         // Logic to find a compte by its ID
    //         $compteRepository = CompteRepository::getInstance();
    //         $result = $compteRepository->selectById($id,);
    //         return $result ? Compte::toObject($result) : null; // Return the compte data or null if not found
    //     }

        public function getCompteByUser(Utilisateur $user): array
        {
            // Logic to get all comptes for a user
            
            $comptes = $this->compteRepository->findByUser($user);
            return $comptes; // Return the array of Compte objects
        }

       
      
    
}