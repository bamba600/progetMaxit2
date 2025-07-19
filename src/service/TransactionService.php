<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Transaction;
use App\Entity\Utilisateur;
use App\Repository\TransactionRepository;

class TransactionService
{
    private TransactionRepository $transactionRepository;
    private static ?TransactionService $instance = null;

    private function __construct()
    {
        $this->transactionRepository = App::getDependency('TransactionRepository');
    }

    public static function getInstance(): TransactionService
    {
        if (self::$instance === null) {
            self::$instance = new TransactionService();
        }
        return self::$instance;
    }

    public function getDernieresTransactionsByUser(Utilisateur $user, int $limit = 10): array
    {
        return $this->transactionRepository->findDernieresTransactionsByUser($user->getId(), $limit);
    }

    public function getTransactionsByCompte(int $compteId, int $limit = 10): array
    {
        return $this->transactionRepository->findByCompte($compteId, $limit);
    }
}
