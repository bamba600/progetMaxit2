<?php
namespace App\Entity;

use App\Core\Abstract\AbstractEntity;
use DateTime;

class Transaction extends AbstractEntity{
  private int $id;
  private float $montant;
  private ?DateTime $date = null;
  private Compte $compte;
  private ?TypeTransaction $typetransaction = null;

  public function __construct($id=0,$montant='',?DateTime $date=null,?TypeTransaction $typetransaction = null){
    $this->id = $id;
    $this->montant = $montant;
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
    $this->date = $date;

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

  
  public function getTypetransaction()
  {
    return $this->typetransaction;
  }

  
  public function setTypetransaction($typetransaction)
  {
    $this->typetransaction = $typetransaction;

    return $this;
  }
  public static function toObject(array $data):?object{
    $transaction = new Transaction();
    $transaction->setId($data['id']);
    $transaction->setTypetransaction($data['idtypetransaction']);
    $transaction->setDate($data['date']);
    $transaction->setMontant($data['montant']);
    $compte = new Compte();
    $compte->setId('idcompte');
    $transaction->setCompte($compte);
    return $transaction;
  }
   public function toArray(){
    return [
      'id'=> $this->getId(),
      'date'=>$this->getDate(),
      'montant'=>$this->getMontant(),
      'compte'=>$this->getCompte()->toArray(),
      ];
   }
  public function toJson(){
    return json_encode($this->toArray());
 }
}

