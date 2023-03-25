<?php

namespace App\Controllers;

class Pekerjaan extends BaseController
{
    public function index()
    {
  
         echo view('pages/pekerjaan');
    }

    public function detail()
    {
  
         echo view('pages/detail-pekerjaan');
    }
}
