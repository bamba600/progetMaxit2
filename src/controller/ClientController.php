<?php

namespace App\Controller;
use App\Core\App;

use App\Core\Abstract\AbstractController;

class ClientController extends AbstractController
{

    public function __construct()
    {
        $this->layout = 'base';
    }

    public function index()
    {
       
        // Render the client dashboard view
        $this->renderHtml('client/dashboard');
    }

public function store()
{}
 public function edit(){}
 public function create(){}
  
}