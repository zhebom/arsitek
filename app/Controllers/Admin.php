<?php

namespace App\Controllers;

use App\Models\situsModel;
use CodeIgniter\Database\Query;

class Admin extends BaseController
{

     protected $sM;
     public function __construct()
     {
          //    $this->userModel = new UserModel();//Create a instance of the model
          //    helper('form', 'url');

          $this->sM = new situsModel();
          $this->sM->query("SELECT * FROM situs ")->getResult();
     }
     public function index()
     {
          // $data = [
          //      'a' => $this->sM,

          // ];
          echo view('admin/pages/beranda.php', $data);
     }

     public function judul()
     {


          echo view('admin/pages/deskripsi.php');
     }

     public function addjudul()
     {

          $today = date("Y-m-d H:i:s");
          //  $sM = new situsModel();
          //  $sM1 = $sM->query("SELECT * FROM situs ")->getResult();

          if ($this->sM) {
               $this->sM->replace([

                    'judul_situs' =>  $this->request->getVar('judul'),
                    'desc_situs' =>  $this->request->getVar('desc'),
                    'updated_at' => $today,


               ]);
          } else {
               $this->sM->save([

                    'judul_situs' =>  $this->request->getVar('judul'),
                    'desc_situs' =>  $this->request->getVar('desc'),
                    'updated_at' => $today,


               ]);
          }

          return view('admin/pages/deskripsi.php');
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
