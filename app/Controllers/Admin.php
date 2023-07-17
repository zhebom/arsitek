<?php

namespace App\Controllers;

use App\Models\situsModel;
use App\Models\sosmedModel;
use App\Models\pelatihanModel;
use App\Models\faqModel;
use App\Models\adminModel;
use CodeIgniter\Database\Query;

class Admin extends BaseController
{

     //  protected $sM;
     protected $helpers = ['form'];


     public function index()
     {
          $session = \Config\Services::session();
          $situs = new situsModel();
          $sosmed = new sosmedModel();
          $pelatihan = new pelatihanModel();
          $faq = new faqModel();
  
          $data = [
              'situs' => $situs->tampilData(),
              'sosmed' => $sosmed->tampilData(),
              'pelatihan' => $pelatihan->tampilData(),
              'faq' => $faq->tampilData(),
              'title' => 'Dashboard',
              'menu' => 'dashboard',
              'admin' => $session->nama
          ];
        
          echo view('admin/pages/beranda.php', $data);
     }

     public function bom(){
          session()->destroy();
     }

     public function insert(){
          $role =1;
          $user = $this->request->getVar('user');
          $pass = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
          
      
          $adminModel = new adminModel();
          $adminModel->save([
               'user' => $user,
               'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
          ]);
          
     }
     public function loginAuth()
    {
        $session = session();
        $adminModel = new adminModel();
        $user = $this->request->getVar('user');
        $password = $this->request->getVar('pass');
        
        $data = $adminModel->where('user', $user)->first();
        
        if($data){
            $pass = $data['pass'];
            
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
               
                $session->set($ses_data);
               
                return redirect()->withInput()->to('/admin');
            
            }else{
                $session->setFlashdata('msg', 'User atau Pass does not exist.');
                return redirect()->to('/mylogin');
            }
        }else{
            $session->setFlashdata('msg', 'User atau Pass does not exist.');
            return redirect()->to('/mylogin');
        }
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
                    'alamat' =>  $this->request->getVar('alamat'),
                    'updated_at' => $today,


               ]);

               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Dirubah</div>');
               return redirect()->to(base_url('admin/situs'))->withinput();
          } else {
               $sM->save([

                    'judul_situs' =>  $this->request->getVar('judul'),
                    'desc_situs' =>  $this->request->getVar('desc'),
                    'alamat' =>  $this->request->getVar('alamat'),
                    'updated_at' => $today,


               ]);
               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
               return redirect()->to(base_url('admin/situs'))->withinput();
          }
     }

     public function faq()
     {

          $sm = new faqModel();

          $data = [
               'title' => 'Pengaturan FAQ',
               'menu' => 'faqSitus',
               'tampil' => $sm->tampilData()

          ];

          echo view('admin/pages/faq.php', $data);
     }
     public function addfaq()
     {


          $data = [
               'title' => 'Pengaturan FAQ',
               'menu' => 'faqSitus',
               'tampil' => null
          ];

          echo view('admin/pages/addfaq.php', $data);
     }

     public function editfaq($id)
     {

          $sm = new faqModel();
          $tampil = $sm->singleData($id);
          $data = [
               'title' => 'Pengaturan FAQ',
               'menu' => 'faqSitus',
               'tampil' => $tampil
          ];

          echo view('admin/pages/editfaq.php', $data);
     }

     public function prosesaddfaq()
     {
          if (!$this->validate(
               [
                    'pertanyaan' => 'required',
                    'keterangan' => 'required',

               ],
               [
                    'pertanyaan' => [
                         'required' => 'Kolom harus diisi'
                    ],
                    'keterangan' => [
                         'required' => 'Keterangan harus diisi'
                    ]

               ]
          )) {

               session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan</div>');
               return redirect()->to(base_url('admin/faqs/add'))->withinput();
          } else {

               $sM = new faqModel();
               $today = date("Y-m-d H:i:s");

               $sM->save([

                    'pertanyaan' =>  $this->request->getVar('pertanyaan'),
                    'keterangan' =>  $this->request->getVar('keterangan'),
                    'updated_at' => $today,


               ]);
               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
               return redirect()->to(base_url('admin/faqs'))->withinput();
          }
     }

     public function proseseditfaq($id)
     {
          if (!$this->validate(
               [
                    'pertanyaan' => 'required',
                    'keterangan' => 'required',

               ],
               [
                    'pertanyaan' => [
                         'required' => 'Kolom harus diisi'
                    ],
                    'keterangan' => [
                         'required' => 'Keterangan harus diisi'
                    ]

               ]
          )) {

               session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan</div>');
               return redirect()->to(base_url('admin/faqs/edit/' . $id))->withinput();
          } else {

               $sM = new faqModel();
               $today = date("Y-m-d H:i:s");

               $sM->save([
                    'id' => $id,
                    'pertanyaan' =>  $this->request->getVar('pertanyaan'),
                    'keterangan' =>  $this->request->getVar('keterangan'),
                    'updated_at' => $today,


               ]);
               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Dirubah</div>');
               return redirect()->to(base_url('admin/faqs/edit/' . $id))->withinput();
          }
     }

     public function deletefaq($id)
     {
          $sM = new faqModel();
          $sM->deleteData($id);
          session()->setFlashdata('msg', '<div class="alert alert-info" role="alert">Data Berhasil Dihapus</div>');
          return redirect()->to(base_url('admin/faqs'))->withinput();
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

     public function deletesosmed($id)
     {
          $sM = new sosmedModel();
          $sM->deleteData($id);
          $oldFile = $this->request->getVar('fileLama');
          unlink('sosmed/' . $oldFile);
          session()->setFlashdata('msg', '<div class="alert alert-info" role="alert">Data Berhasil Dihapus</div>');
          return redirect()->to(base_url('admin/sosmed'))->withinput();
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

     public function editsosmed($id)
     {
          $validasi =  \Config\Services::validation();
          $sM = new sosmedModel();
          $data = [
               'title' => 'Pengaturan Sosial Media',
               'menu' => 'sosmedSitus',
               'validasi' => $validasi,
               'tampil' => $sM->singleData($id)
          ];

          echo view('admin/pages/editsosmed.php', $data);

          //return redirect()->to(base_url('admin/sosmed/add'))->withinput();
     }

     public function proseseditsosmed($id)
     {

          if (!$this->validate(
               [
                    'sosmed' => 'required',
                    'link' => 'required',
                    'customFile' => 'ext_in[customFile,jpg,png]'
               ],
               [
                    'sosmed' => [
                         'required' => 'Nama Sosial Media harus diisi'
                    ],
                    'link' => [
                         'required' => 'Link harus diisi'
                    ],
                    'customFile' => [

                         'ext_in' => 'File harus berekstensi JPG/PNG'

                    ]

               ]
          )) {

               session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan</div>');
               return redirect()->to(base_url('admin/sosmed/edit/' . $id))->withinput();
          } else {
               $sM = new sosmedModel();
               $today = date("Y-m-d H:i:s");
               $filePend = $this->request->getFile('customFile');
               $namaFile = $filePend->getName();
               if ($filePend->getError() == 4) {
                    $sM->replace([
                         'id' => $id,
                         'nama' =>  $this->request->getVar('sosmed'),
                         'link' =>  $this->request->getVar('link'),
                         'logo' =>  $this->request->getVar('fileLama'),
                         'updated_at' => $today,
                    ]);
                    session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    return redirect()->to(base_url('admin/sosmed'))->withinput();
               } else {
                    $oldFile = $this->request->getVar('fileLama');
                    $filePend->move('sosmed');
                    $sM->replace([
                         'id' => $id,
                         'nama' =>  $this->request->getVar('sosmed'),
                         'link' =>  $this->request->getVar('link'),
                         'logo' => $namaFile,
                         'updated_at' => $today,
                    ]);
                    unlink('sosmed/' . $oldFile);
                    session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    return redirect()->to(base_url('admin/sosmed'))->withinput();
               }
          }
     }
     public function prosesaddsosmed()
     {

          if (!$this->validate(
               [
                    'sosmed' => 'required',
                    'link' => 'required',
                    'customFile' => 'uploaded[customFile]|ext_in[customFile,jpg,png]'
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
                         'ext_in' => 'File harus berekstensi JPG/PNG'
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
          $sM = new pelatihanModel();

          $validasi =  \Config\Services::validation();
          $data = [
               'title' => 'Pengaturan Pelatihan',
               'menu' => 'pelatihan',
               'validasi' => $validasi,
               'sM' => $sM->tampilData()
          ];
          echo view('admin/pages/pelatihan.php', $data);
     }
     public function addpelatihan()
     {


          $validasi =  \Config\Services::validation();
          $data = [
               'title' => 'Pengaturan Pelatihan',
               'menu' => 'pelatihan',
               'validasi' => $validasi

          ];
          echo view('admin/pages/tambahpelatihan.php', $data);
     }

     public function prosesaddpelatihan()
     {

          if (!$this->validate(
               [
                    'pelatihan' => 'required',
                    'kuota' => 'required',
                    'tempat' => 'required',
                    'biaya' => 'required',
                    'tglpelatihan' => 'required',
                    'endpendaftaran' => 'required',
                    'customFile' => 'uploaded[customFile]|ext_in[customFile,jpg,jpeg,png]'
               ],
               [
                    'pelatihan' => [
                         'required' => 'Nama Pelatihan harus diisi'
                    ],
                    'kuota' => [
                         'required' => 'Kuota harus diisi'
                    ],
                    'biaya' => [
                         'required' => 'Biaya harus diisi'
                    ],
                    'tempat' => [
                         'required' => 'Tempat harus diisi'
                    ],
                    'tglpelatihan' => [
                         'required' => 'Tanggal Pelatihan harus diisi'
                    ],
                    'endpendaftaran' => [
                         'required' => 'Batas akhir pendaftaran harus diisi'
                    ],
                    'customFile' => [
                         'uploaded' => 'lho kok belum upload',
                         'ext_in' => 'File harus berekstensi JPG/PNG'
                    ]
               ]
          )) {

               session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan</div>');
               return redirect()->to(base_url('admin/pelatihan/add'))->withinput();
          } else {
               $sM = new pelatihanModel();
               $today = date("Y-m-d H:i:s");
               $filePend = $this->request->getFile('customFile');
               $filePend->move('thumbnails');
               $namaFile = $filePend->getName();
               $slug = url_title($this->request->getVar('pelatihan'), ("-"));
               if ($sM->slugData($slug) > 0) {
                    session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan Karena Judul Pelatihan Sudah Ada</div>');
                    return redirect()->to(base_url('admin/pelatihan/add'))->withinput();
               } else {
                    $sM->save([
                         'pelatihan' =>  $this->request->getVar('pelatihan'),
                         'slug' => $slug,
                         'kuota' =>  $this->request->getVar('kuota'),
                         'biaya' =>  $this->request->getVar('biaya'),
                         'tempat' =>  $this->request->getVar('tempat'),
                         'tglpelatihan' =>  $this->request->getVar('tglpelatihan'),
                         'endpendaftaran' =>  $this->request->getVar('endpendaftaran'),
                         'gambar' =>  $namaFile,
                         'updated_at' => $today,


                    ]);
                    session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
                    return redirect()->to(base_url('admin/pelatihan'))->withinput();
               }
          }
     }
}
