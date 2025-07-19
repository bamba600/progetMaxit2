<?php
namespace App\Core\Abstract;

use App\Core\Session;
use App\Core\App;

abstract class AbstractController{

  protected Session $session;
  public function __construct(){
   $this->session = App::getDependency('Session'); // Get the session instance from the App container
  
    
  }
  protected $layout = 'base';
  abstract  public function index();
  abstract public function store();
  abstract public function edit();
  abstract public function create();
  public function renderHtml(string $view,array $data=[]):void{
    // Extraire les données pour les rendre disponibles comme variables dans la vue
    extract($data);
    
    // Rendre les erreurs de session disponibles
    $errors = $this->session->get('errors') ?? [];
    $this->session->unset('errors'); // Supprimer les erreurs après affichage
    
    ob_start();
    require_once __DIR__.'/../../../template/'.$view.'.html.php';
    $content = ob_get_clean();
    require_once __DIR__.'/../../../template/layout/'.$this->layout.'.layout.php';
  }
}

