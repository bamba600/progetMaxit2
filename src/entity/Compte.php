<?php
namespace App\Entity;
use App\Core\Abstract\AbstractEntity;
use DateTime;

class Compte extends AbstractEntity{
  private int $id;
  private ?DateTime $dateCreation = null;
  private float $solde;
  private int $numeroCompte;
  private string $type = 'principal'; // principal ou secondaire
  private ?StatutCompte $statutCompte = null;
  private array $transactions = [];
  private Utilisateur $Utilisateur;
  public function __construct($id = 0,?DateTime $dateCreation=null,$solde=0,$numeroCompte = 0,?StatutCompte $statutCompte = null){
    $this->id = $id;
    $this->dateCreation = $dateCreation;
    $this->solde = $solde;
    $this->numeroCompte = $numeroCompte;
    $this->Utilisateur = new Utilisateur();
    $this->statutCompte = $statutCompte;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }
  public function getDate_creation()
  {
    return $this->dateCreation;
  }
  public function setDate_creation($date_creation)
  {
    $this->dateCreation = $date_creation;

    return $this;
  }
  public function getSolde()
  {
    return $this->solde;
  }

  
  public function setSolde($solde)
  {
    $this->solde = $solde;

    return $this;
  }

 
  public function getNumeroCompte()
  {
    return $this->numeroCompte;
  }
  public function setNumeroCompte($numeroCompte)
  {
    $this->numeroCompte = $numeroCompte;

    return $this;
  }
  public function getTransactions()
  {
    return $this->transactions;
  }
  public function addTransaction($transaction)
  {
    $this->transactions[] = $transaction;

    return $this;
  }
  public function getUtilisateur()
  {
    return $this->Utilisateur;
  }


  public function setUtilisateur($Utilisateur)
  {
    $this->Utilisateur = $Utilisateur;

    return $this;
  }

  
  public function getStatutCompte()
  {
    return $this->statutCompte;
  }

 
  public function setStatutCompte($statutCompte)
  {
    $this->statutCompte = $statutCompte;

    return $this;
  }
  public function getType()
  {
    return $this->type;
  }
  
  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }
   static public function toObject(array $data):?object{
    $compte = new Compte();
    $compte->setId($data['id'] ?? 0);
    $compte->setSolde($data['solde'] ?? 0);
    $compte->setNumeroCompte((int)($data['numeroCompte'] ?? 0));
    $compte->setType($data['type'] ?? 'principal');
    
    if(isset($data['date_creation'])) {
        $compte->setDate_creation(new DateTime($data['date_creation']));
    }
    
    $utilisateur = new Utilisateur();
    $utilisateur->setId($data['idUtilisateur'] ?? 0);
    $compte->setUtilisateur($utilisateur);

    return $compte;
   }
   public function toArray(){
    return[
      'id'=>$this->getId(),
      'solde'=>$this->getSolde(),
      'numeroCompte'=>$this->getNumeroCompte(),
      'statutCompte'=>$this->getStatutCompte()?->value,
      'utilisateur'=>$this->getUtilisateur()->toArray(),
      'transactions'=>array_map(fn($transaction) => $transaction->toArray(),$this->getTransactions())
    ];
   }
  public function toJson(){
  }
}

