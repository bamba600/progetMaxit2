<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Utilisateur;
use App\Repository\PersonneRepository;

class SecurityService
{

        private static ?SecurityService $instance = null;
        private PersonneRepository $personneRepository;

        private function __construct()
        {
            // Private constructor to prevent direct instantiation
            $this->personneRepository = App::getDependency('PersonneRepository');
              
        }
    
        public static function getInstance(): SecurityService
        {
            if (self::$instance === null) {
                self::$instance = new SecurityService();
            }
            return self::$instance;
        }

        public function seConnecter (string $login, string $password):?Utilisateur
        {
            // Logic to authenticate the user
           $personne=$this->personneRepository->findByLogin($login);
           if(($personne)&& ($personne->getPassword() === $password)){
               var_dump($personne);
                // Authentication successful
                return $personne; // Return the authenticated user object
            } else {
                // Authentication failed
                return null; // Or throw an exception, or handle as needed
            }

           

        }
    
}