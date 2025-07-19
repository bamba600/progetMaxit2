<?php
namespace App\Core\Middlewares;
use App\Core\Session;

class Auth {
    private Session $session;
    
    public function __construct() {
        $this->session = Session::getInstance();
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