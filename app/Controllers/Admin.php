<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
  
         echo view('admin/pages/beranda.php');
    }

    public function judul()
    {
  
         echo view('admin/pages/deskripsi.php');
    }
}
