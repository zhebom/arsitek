<?php

namespace App\Controllers;

use App\Models\situsModel;
use App\Models\sosmedModel;
use CodeIgniter\Database\Query;

class Admin extends BaseController
{

     //  protected $sM;
     protected $helpers = ['form'];
  
    
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
          $sM = new sosmedModel();
          $sM = $sM->tampilData();
          $data = [
               'title' => 'Pengaturan Sosial Media',
               'menu' => 'sosmedSitus',
               'sosmed' => $sM
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
                    'customFile' => 'uploaded[customFile]|ext_in[customFile,jpg]'
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
          } else {
               $sM = new sosmedModel();
               $today = date("Y-m-d H:i:s");
               $filePend = $this->request->getFile('customFile');       
               $filePend->move('sosmed');
               $namaFile = $filePend->getName();
               $sM->save([

                    'nama' =>  $this->request->getVar('sosmed'),
                    'link' =>  $this->request->getVar('link'),
                    'logo' =>  $namaFile,
                    'updated_at' => $today,


               ]);
               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
               return redirect()->to(base_url('admin/sosmed'))->withinput();

          }


     }

     public function pelatihan()
     {


          echo view('admin/pages/pelatihan.php');
     }
}
