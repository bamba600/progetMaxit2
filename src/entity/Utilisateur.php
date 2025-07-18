<?php
namespace App\Entity;
use App\Core\Abstract\AbstractEntity;

class Utilisateur extends AbstractEntity{
  private int $id;
  private string $nom;
  private string $prenom;
  private string $numeroTelephone;
  private string $adresse;
  private string $login;
  private string $password;
  private string $photoRecto;
  private string $photoVerso;
  private string $numeroIdentite;
  private array $comptes = [];
  private TypeUtilisateur $TypeUtilisateur;
  public function __construct($id = 0,$nom ='',$prenom = '',$numeroTelephone ='',$adresse ='',$login='',$password ='',$photoRecto='',$photoVerso='',$numeroIdentite=''){
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->numeroTelephone =$numeroTelephone;
    $this->adresse = $adresse;
    $this->login = $login;
    $this->password = $password;
    $this->photoRecto = $photoRecto;
    $this->photoVerso = $photoVerso;
    $this->numeroIdentite = $numeroIdentite;
    $this->TypeUtilisateur = new TypeUtilisateur();
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

 
  public function getPrenom()
  {
    return $this->prenom;
  }


  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;

    return $this;
  }

  public function getNumeroTelephone()
  {
    return $this->numeroTelephone;
  }

 
  public function setNumeroTelephone($numeroTelephone)
  {
    $this->numeroTelephone = $numeroTelephone;

    return $this;
  }

  
  public function getAdresse()
  {
    return $this->adresse;
  }

 
  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;

    return $this;
  }

 
  public function getLogin()
  {
    return $this->login;
  }

 
  public function setLogin($login)
  {
    $this->login = $login;

    return $this;
  }

  
  public function getPassword()
  {
    return $this->password;
  }

 
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

 
  public function getPhotoRecto()
  {
    return $this->photoRecto;
  }

  
  public function setPhotoRecto($photoRecto)
  {
    $this->photoRecto = $photoRecto;

    return $this;
  }

 
  public function getPhotoVerso()
  {
    return $this->photoVerso;
  }

 
  public function setPhotoVerso($photoVerso)
  {
    $this->photoVerso = $photoVerso;

    return $this;
  }

 
  public function getNumeroIdentite()
  {
    return $this->numeroIdentite;
  }

 
  public function setNumeroIdentite($numeroIdentite)
  {
    $this->numeroIdentite = $numeroIdentite;

    return $this;
  }
 
  public function getTypeUtilisateur()
  {
    return $this->TypeUtilisateur;
  }

 
  public function setTypeUtilisateur($TypeUtilisateur)
  {
    $this->TypeUtilisateur = $TypeUtilisateur;

    return $this;
  }

 
  public function getComptes()
  {
    return $this->comptes;
  }

 
  public function addComptes( $comptes)
  {
    $this->comptes[] = $comptes;

    return $this;
  }
   public static function toObject(array $data):?object{
      $user = new Utilisateur();
      $user->setId($data['id']);
      $user->setnom($data['nom']);
      $user->setPrenom($data['prenom']);
      $user->setNumeroTelephone($data['numerotelephone']);
      $user->setLogin($data['login']);
      $user->setPassword($data['password']);
      $user->setPhotoRecto($data['photorecto']);
      $user->setPhotoVerso($data['photoverso']);
      $user->setNumeroIdentite(($data['numeroidentite']));
      $TypeUtilisateur = new TypeUtilisateur();
      $TypeUtilisateur->setid($data['idtypeutilisateur']);
      $user->setTypeUtilisateur($TypeUtilisateur);
      return $user;
   }
   public function toArray():?array{
   return [
    'id'=> $this->getId(),
    'typeUtilisateur'=>$this->getTypeUtilisateur()->toArray(),
    'nom'=>$this->getNom(),
    'prenom'=>$this->getPrenom(),
    'numeroNumerotelephone'=>$this->getNumeroTelephone(),
    'login'=>$this->getLogin(),
    'password'=>$this->getPassword(),
    'numeroIdentite'=>$this->getNumeroIdentite(),
    'photoRecto'=>$this->getPhotoRecto(),
    'photoVerso'=>$this->getPhotoVerso(),
    'comptes'=>array_map(fn($compte) => $compte->toArray(),$this->getComptes()),
   ];
   }
   public function toJson():string|bool{

    return json_encode($this->toArray());
   }
}


