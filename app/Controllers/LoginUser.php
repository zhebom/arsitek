<?php

namespace App\Controllers;

use App\Models\userModel;
use App\Models\situsModel;
use App\Models\sosmedModel;
use App\Models\pelatihanModel;
use App\Models\cartModel;
use App\Models\faqModel;

class LoginUser extends BaseController
{
     public function index()
     {

          echo view('validasi/login.php');
     }

     public function user()
     {

          echo view('validasi/login-user.php');
     }

     public function reguser()
     {

          echo view('validasi/register-user.php');
     }

     public function prosesadduser()
     {

          if (!$this->validate(
               [
                    'nama'     => 'required',
                    'pass'     => 'required',
                    'passconf' => 'required|matches[pass]',
                    'email'        => 'required|valid_email|is_unique[user.user,id,{id}]'
               ],
               [
                    'nama' => [
                         'required' => 'Nama Harus diisi'
                    ],
                    'pass' => [
                         'required' => 'Password harus diisi',

                    ],

                    'passconf' => [
                         'required' => 'Password harus diisi',
                         'matches' => 'Password Tidak Sama',

                    ],
                    'email' => [
                         'required' => 'Email harus diisi',
                         'valid_email' => 'Masukkan Format Email Yang Benar',
                         'is_unique' => 'Email Sudah Terdaftar Sebelumnya'

                    ],
               ]
          )) {

               session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan</div>');
               return redirect()->to(base_url('register'))->withinput();
          } else {
               $uM = new userModel();
               $pass = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
               $today = date("Y-m-d H:i:s");
               $uM->save([
                    'nama' =>  $this->request->getVar('nama'),
                    'user' =>  $this->request->getVar('email'),
                    'pass' =>  $pass,
                    'role' => 2,
                    'created_at' => $today,


               ]);
               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
               return redirect()->to(base_url('register'))->withinput();
          }
     }

     public function loginAuth()
     {
          $session = session();
          $userModel = new userModel();
          $user = $this->request->getVar('user');
          $password = $this->request->getVar('pass');

          $data = $userModel->where('user', $user)->first();

          if ($data) {
               $pass = $data['pass'];

               $authenticatePassword = password_verify($password, $pass);
               if ($authenticatePassword) {
                    $ses_data = [
                         'id' => $data['id'],
                         'email' => $data['user'],
                         'nama' => $data['nama'],
                         'hp' => $data['no_ktp'],
                         'role' => $data['role'],
                         'isLoggedIn' => TRUE
                    ];

                    $session->set($ses_data);

                    return redirect()->withInput()->to('/');
               } else {
                    $session->setFlashdata('msg', 'User atau Pass does not exist.');
                    return redirect()->to('/login');
               }
          } else {
               $session->setFlashdata('msg', 'User atau Pass does not exist.');
               return redirect()->to('/login');
          }
     }

     public function editUser()
     {

          $session = session();
          $uM = new userModel();
          $data = [

               'id' => $this->request->getVar('id'),

               'nama' => $this->request->getVar('nama'),
               'no_ktp' => $this->request->getVar('hp'),
          ];

          $uM->save($data);
          session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Dirubah</div>');
          return redirect()->to('profil');
     }

     public function editPass()
     {

          $situs = new situsModel();
          $user = new userModel();
          $sosmed = new sosmedModel();
          $pelatihan = new pelatihanModel();
          $faq = new faqModel();
          $iduser = session()->get('id');




          $data = [
               'situs' => $situs->tampilData(),
               'sosmed' => $sosmed->tampilData(),
               'user' => $user->singleData($iduser),
               'faq' => $faq->tampilData(),
          ];

          echo view('pages/pass', $data);
     }
     public function prosesPass()
     {
          if (!$this->validate(
               [

                    'pass'     => 'required',
                    'passconf' => 'required|matches[pass]',

               ],
               [

                    'pass' => [
                         'required' => 'Password harus diisi',

                    ],

                    'passconf' => [
                         'required' => 'Password harus diisi',
                         'matches' => 'Password Tidak Sama',

                    ]
               ]
          )) {

               session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">Data Gagal Disimpan</div>');
               return redirect()->to(base_url('pass'))->withinput();
          } else {
               $uM = new userModel();
               $pass = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
               $today = date("Y-m-d H:i:s");
               $id = session()->get('id');

               $uM->save([
                    'id' => $id,
                    'pass' =>  $pass,

                    'updated_at' => $today,


               ]);
               session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
               return redirect()->to(base_url('pass'))->withinput();
          }
     }
}
