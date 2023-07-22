<?php

namespace App\Controllers;
use App\Models\userModel;
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
               $pass = md5($this->request->getVar('pass'));
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
}
