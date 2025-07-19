<?php
namespace App\Entity;

use App\Core\Abstract\AbstractEntity;
use DateTime;

class Transaction extends AbstractEntity{
  private int $id;
  private float $montant;
  private ?DateTime $date = null;
  private string $type; // paiement, depot, retrait
  private Compte $compte;
  private ?string $description = null; // Pour ajouter une description optionnelle

  public function __construct($id=0,$montant=0.0,?DateTime $date=null,$type='depot'){
    $this->id = $id;
    $this->montant = $montant;
    $this->date = $date ?? new DateTime();
    $this->type = $type;
    $this->compte = new Compte();
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

 
  public function getMontant()
  {
    return $this->montant;
  }

   
  public function setMontant($montant)
  {
    $this->montant = $montant;
    return $this;
  }

  public function getDate()
  {
    return $this->date;
  }

  
  public function setDate($date)
  {
    if (is_string($date)) {
      $this->date = new DateTime($date);
    } else {
      $this->date = $date;
    }
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

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
    return $this;
  }

  
  public function getCompte()
  {
    return $this->compte;
  }

  
  public function setCompte($compte)
  {
    $this->compte = $compte;
    return $this;
  }

  public static function toObject(array $data):?object{
    $transaction = new Transaction();
    $transaction->setId($data['id'] ?? 0);
    $transaction->setMontant($data['montant'] ?? 0.0);
    
    if (isset($data['date'])) {
      $transaction->setDate($data['date']);
    }
    
    $transaction->setType($data['type'] ?? 'depot');
    
    if (isset($data['idCompte'])) {
      $compte = new Compte();
      $compte->setId($data['idCompte']);
      $transaction->setCompte($compte);
    }
    
    return $transaction;
  }
  
   public function toArray(){
    return [
      'id'=> $this->getId(),
      'date'=>$this->getDate() ? $this->getDate()->format('Y-m-d H:i:s') : null,
      'montant'=>$this->getMontant(),
      'type'=>$this->getType(),
      'description'=>$this->getDescription(),
      'compte'=>$this->getCompte()->toArray(),
      ];
   }
   
  public function toJson(){
    return json_encode($this->toArray());
 }
}

