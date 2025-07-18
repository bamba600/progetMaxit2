<?php
namespace App\Core\Middlewares;
use App\Core\Session;
use App\Core\App;

class Auth {
    private Session $session;
    
    public function __construct() {
        $this->session = App::getDependency('Session');
    }
    
    public function __invoke()
    {
        // Check if the user is authenticated
        if (!$this->session->get('user')) {
            // If not authenticated, redirect to login page
            header('Location: /');
            exit;
        }
    }
}