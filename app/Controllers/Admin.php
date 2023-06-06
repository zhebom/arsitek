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

    public function faq()
    {
        

         echo view('admin/pages/faq.php');

         
    }

     public function sosmed()
    {
        

         echo view('admin/pages/sosmed.php');

         
    }

    public function pelatihan()
    {
        

         echo view('admin/pages/pelatihan.php');

         
    }
}
