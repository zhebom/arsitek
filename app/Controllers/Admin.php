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
          echo view('admin/pages/beranda.php', $data);
     }

     public function judul()
     {
          $sM = new situsModel();

          $data = [
               'title' => 'Pengaturan Situs',
               'menu' => 'deskripsiSitus',
               'tampil' => $sM->tampilData()
          ];
          echo view('admin/pages/deskripsi.php', $data);
     }

     public function addjudul()
     {


          $sM = new situsModel();
          //  $sM1 = $sM->query("SELECT * FROM situs ")->getResult();
          $today = date("Y-m-d H:i:s");
          if ($sM->tampilData()) {




               $sM->replace([

                    'judul_situs' =>  $this->request->getVar('judul'),
                    'desc_situs' =>  $this->request->getVar('desc'),
                    'updated_at' => $today,


               ]);

               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Dirubah</div>');
               return redirect()->to(base_url('admin/situs'))->withinput();
          } else {
               $sM->save([

                    'judul_situs' =>  $this->request->getVar('judul'),
                    'desc_situs' =>  $this->request->getVar('desc'),
                    'updated_at' => $today,


               ]);
               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
               return redirect()->to(base_url('admin/situs'))->withinput();
          }
     }

     public function faq()
     {


          echo view('admin/pages/faq.php');
     }

     public function sosmed()
     {


          $data = [
               'title' => 'Pengaturan Sosial Media',
               'menu' => 'sosmedSitus'
          ];
          echo view('admin/pages/sosmed.php', $data);
     }

     public function addsosmed()
     {
          $validasi =  \Config\Services::validation();

          $data = [
               'title' => 'Pengaturan Sosial Media',
               'menu' => 'sosmedSitus',
               'validasi' => $validasi
          ];
          echo view('admin/pages/tambahsosmed.php', $data);
          //return redirect()->to(base_url('admin/sosmed/add'))->withinput();
     }

     public function prosesaddsosmed()
     {
         
          if (!$this->validate(
               [
                    'sosmed' => 'required',
                    'link' => 'required',
                    'customFile' => 'uploaded[customFile]|ext_in[customFile,jpeg]'
               ],
               [
                    'sosmed' => [
                         'required' => 'Nama Sosial Media harus diisi'
                    ],
                    'link' => [
                         'required' => 'Link harus diisi'
                    ],
                    'customFile' => [
                         'uploaded' => 'lho kok belum upload',
                         'ext_in' => 'File harus berekstensi JPG/JPEG'
                     ]

               ]
          )) {

               session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan</div>');
               return redirect()->to(base_url('admin/sosmed/add'))->withinput();
          }


     }

     public function pelatihan()
     {


          echo view('admin/pages/pelatihan.php');
     }
}
