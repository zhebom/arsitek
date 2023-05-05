<?php

namespace App\Controllers;

class LoginKontrak extends BaseController
{
    public function index()
    {
  
         echo view('validasi/login.php');
    }

    public function list()
    {
  
         echo view('validasi/kontraktor.php');
    }
}
