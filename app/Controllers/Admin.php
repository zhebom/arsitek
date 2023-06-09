<?php

namespace App\Controllers;

use App\Models\situsModel;
use CodeIgniter\Database\Query;

class Admin extends BaseController
{

     //  protected $sM;
     public function __construct()
     {
          //    $this->userModel = new UserModel();//Create a instance of the model
          //    helper('form', 'url');
          // $sM = new situsModel();
          
          // $this->sM->query("SELECT * FROM situs ")->getResult();
     }
     public function index()
     {
          $data = [
               'title' => 'Dashboard',
               'menu' => 'dashboard'
          ];
          echo view('admin/pages/beranda.php',$data);
     }

     public function judul()
     {
          $sM = new situsModel();
          
          $data = [
               'title' => 'Pengaturan Situs',
               'menu' => 'deskripsiSitus',
               'tampil' => $sM->tampilData()
          ];
          echo view('admin/pages/deskripsi.php',$data);
     }

     public function addjudul()
     {

          $data = [
               'title' => 'Pengaturan Situs',
               'menu' => 'deskripsiSitus',
               
          ];
           $sM = new situsModel();
          //  $sM1 = $sM->query("SELECT * FROM situs ")->getResult();
          $today = date("Y-m-d H:i:s");
          if ($sM->tampilData()) {
               
               
                    
               
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

          return redirect()->to('admin/situs');
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
