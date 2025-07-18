<?php
namespace App\Controller;
use App\Core\Abstract\AbstractController;
use App\Service\SecurityService;
use App\Core\Session;
use App\Core\Validator;
use App\Core\App;

class SecurityController extends AbstractController
{

 private SecurityService $securityService; 
  public function __construct(){
    parent::__construct(); // Call the parent constructor to initialize session or other properties
    $this->layout='security';
    
    //$this->securityService = SecurityService::getInstance();
    $this->securityService = App::getDependency('SecurityService');
  }
  public function index(){
    
    $this->renderHtml('security/login');
  }
  public function store(){
 
  }
  public function edit(){

  }
  public function create(){

  }
  public function login(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      //validation a faire
      $post=["login"=>trim($_POST['login'] ??""),
             "password"=>trim($_POST['password']??"")

      ];
      Validator::validate($post, [
        'login' => [ 'required', 'email'],
        'password' => ['required', 'min:3']
      ]);

      if(Validator::isValid())
      {
         extract($post);
         $user=$this->securityService->seConnecter($login, $password);
       if($user)
       {
          $this->session->set("user",$user->toArray());
          header('Location: /client/dashboard'); 
          exit;
       } else {
            Validator::addError('globalErrors','login ou mot de passe incorrect');
       }
      }
      
      // Si on arrive ici, il y a des erreurs
      $this->session->set('errors',Validator::getErrors());
      header('Location:/'); 
      exit;    
       

    }
         

  }
   public  function logout(){
        // Clear the session or specific user data
        $this->session->destroy(); // Assuming you want to destroy the session
        header('Location:/'); // Redirect to login page or home
        exit;
       }
       

}


























 

