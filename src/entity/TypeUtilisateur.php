<?php
namespace App\Entity;
class TypeUtilisateur{
  private int $id;
  private string $nom;
  public function __construct($id =0,$nom=''){
    $this->id = $id;
    $this->nom=$nom;
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

 
  public function getNom()
  {
    return $this->nom;
  }

 
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }
  public function toObject(array $data):?object{
  return null;
  }
  public function toArray(){

  }
}