<?php
namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Transaction;
use PDO;
use DateTime;

class TransactionRepository extends AbstractRepository
{
    private static ?TransactionRepository $instance = null;
    
    private function __construct()
    {
        parent::__construct();
        $this->table = 'transaction';
    }
    
    public static function getInstance(): TransactionRepository
    {
        if (self::$instance === null) {
            self::$instance = new TransactionRepository();
        }
        return self::$instance;
    }
    
    public function selectAll()
    {
        // Implementation if needed
    }
    
    public function insert($entity)
    {
        // Implementation if needed
    }
    
    public function update($entity)
    {
        // Implementation if needed
    }
    
    public function delete($entity)
    {
        // Implementation if needed
    }
    
    public function findByCompte($compteId, $limit = 10)
    {
        $query = "SELECT * FROM {$this->table} WHERE idCompte = :compte_id ORDER BY date DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':compte_id', $compteId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($transaction) => Transaction::toObject($transaction), $rows);
    }
    
    public function findDernieresTransactionsByUser($userId, $limit = 10)
    {
        $query = "SELECT t.* FROM {$this->table} t 
                  INNER JOIN compte c ON t.idCompte = c.id 
                  WHERE c.idUtilisateur = :user_id 
                  ORDER BY t.date DESC 
                  LIMIT :limit";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($transaction) => Transaction::toObject($transaction), $rows);
    }
}
