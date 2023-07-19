<?php

namespace App\Controllers;

class LoginUser extends BaseController
{
    public function index()
    {
  
         echo view('validasi/login.php');
    }

    public function list()
    {
  
         echo view('validasi/choice.php');
    }
}
