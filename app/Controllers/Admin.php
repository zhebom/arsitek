<?php

namespace App\Controllers;

use App\Models\situsModel;
use CodeIgniter\Database\Query;

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

     public function addjudul()
     {

          $today = date("Y-m-d H:i:s");
          $sM = new situsModel();
          $sM1 = $sM->query("SELECT * FROM situs ")->getResult();
          if ($sM1) {
               $sM->replace([

                    'judul_situs' =>  $this->request->getVar('judul'),
                    'desc_situs' =>  $this->request->getVar('desc'),
                    'updated_at' => $today,


               ]);
          } else {
               $sM->save([

                    'judul_situs' =>  $this->request->getVar('judul'),
                    'desc_situs' =>  $this->request->getVar('desc'),
                    'updated_at' => $today,


               ]);
          }
          //     echo view('admin/pages/deskripsi.php');


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
