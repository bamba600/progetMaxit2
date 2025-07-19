<?php

namespace App\Controller;
use App\Core\App;

use App\Core\Abstract\AbstractController;
use App\Entity\Compte;
use App\Entity\Utilisateur;
use App\Service\CompteService;
use App\Service\TransactionService;

class ClientController extends AbstractController
{
    private ?CompteService $compteService = null;
    private ?TransactionService $transactionService = null;

    public function __construct()
    {
        parent::__construct(); // Call the parent constructor to initialize session or other properties
        $this->layout = 'base';
        $this->compteService = App::getDependency('CompteService');
        $this->transactionService = App::getDependency('TransactionService');
    }

    public function index()
    {
        $user = $this->session->get('user');
        $user = Utilisateur::toObject($user);
        
        // Initialiser les services si pas encore fait
        if (!$this->compteService) {
            $this->compteService = App::getDependency('CompteService') ?? \App\Service\CompteService::getInstance();
        }
        if (!$this->transactionService) {
            $this->transactionService = App::getDependency('TransactionService') ?? \App\Service\TransactionService::getInstance();
        }
        
        $listCompte = $this->compteService->getCompteByUser($user);
        
        // Récupérer spécifiquement le compte principal (type = 'principal')
        $comptePrincipal = null;
        foreach ($listCompte as $compte) {
            if ($compte->getType() === 'principal') {
                $comptePrincipal = $compte;
                break;
            }
        }
        
        // Récupérer les dernières transactions de l'utilisateur
        $dernieresTransactions = $this->transactionService->getDernieresTransactionsByUser($user, 10);
        
        // Passer les données à la vue
        $this->renderHtml('client/dashboard', [
            'comptePrincipal' => $comptePrincipal,
            'dernieresTransactions' => $dernieresTransactions
        ]);
    }

public function store()
{

}
 public function edit(){}
 public function create(){}
  
}