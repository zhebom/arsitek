<?php

namespace App\Controllers;

use App\Models\DaftarModel;
use App\Models\SimpanModel;
use App\Models\AktifModel;
use App\Models\AkademikModel;
use App\Models\MenuModel;
use App\Models\ProdiModel;
use App\Models\DekanModel;
use Config\View;
use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;

class Pages extends BaseController
{
    protected $daftarModel;
    protected $simpanModel;

    public function __construct()
    {
        $this->daftarModel = new DaftarModel();
        
    }

    public function index()
    {
       
            
            $validasi =  \Config\Services::validation();
        $data = [
            'title' => 'Halaman Login',
            'validasi' => $validasi
        ];     //  view('templates/head', $data);
        echo view('pages/login', $data);
        
    }

    public function home($page = 'sign_up')
    {

        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $validasi =  \Config\Services::validation();
        
        $role = session()->get('role');
        $jurusan =  $this->daftarModel->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();

        $data = [
            'title' => 'Form Pendaftaran Akun Pelayanan Surat',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'menu' => $menu
        ];


        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }

    public function prodi($page = 'addprodi')
    {

        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $validasi =  \Config\Services::validation();
        
        $role = session()->get('role');
        $jurusan =  $this->daftarModel->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();

        $data = [
            'title' => 'Tambah Program Studi',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'menu' => $menu
        ];


         echo view('templates/head', $data);
        echo view('pages/' . $page, $data);
     echo view('templates/foot', $data);
    }

    public function editjurusan($id_jurusan)
    {

        $validasi =  \Config\Services::validation();
        
        $role = session()->get('role');
        $jurusan =  $this->daftarModel->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $prodiModel = new ProdiModel();
        $prodi = $prodiModel->where('id_jurusan', $id_jurusan)->first();
        $data = [
            'title' => 'Edit Program Studi',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'menu' => $menu,
            'prodi' => $prodi
        ];


         echo view('templates/head', $data);
        echo view('pages/editprodi' ,$data);
     echo view('templates/foot', $data);
    }

    public function simpan()
    {

        if (!$this->validate(
            [
                'npm' => 'required|min_length[10]|is_unique[feb_user.npm_user]',
                'nama' => 'required',
                'email' => 'required|valid_email',
                'alamat' => 'required',
                'tempatlahir' => 'required',
                'tanggallahir' => 'required',
                'pass' => 'required',
                'passconf' => 'matches[pass]',
            ],
            [
                'npm' => [
                    'required' => 'NPM harus diisi',
                    'min_length' => 'NPM yang anda masukkan salah',
                    'is_unique' => 'NPM yang anda masukkan sudah terdaftar silahkan untuk melakukan reset password di pelayanan dengan membawa KTM',
                ],
                'nama' => [
                    'required' => 'Nama harus diisi',
                ],
                'email' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Masukkan email yang benar'
                ],
                'alamat' => [
                    'required' => 'Alamat harus diisi',
                ],
                'tempatlahir' => [
                    'required' => 'Tempat lahir harus diisi',
                ],
                'tanggallahir' => [
                    'required' => 'Tanggal lahir harus diisi',
                ],
                'pass' => [
                    'required' => 'Password harus diisi',
                ],
                'passconf' => [
                    'matches' => 'Password yang dimasukkan tidak sama',
                ]
            ]
        )) {
            return redirect()->to(base_url('/daftar'))->withInput();
        }

        $today = date("Y-m-d H:i:s");
        $simpanModel = new SimpanModel();
        $simpanModel->save([
            'npm_user' => $this->request->getVar('npm'),
            'nama_user' => $this->request->getVar('nama'),
            'email_user' => $this->request->getVar('email'),
            'jurusan_user' => $this->request->getVar('jurusan'),
            'alamat_user' => $this->request->getVar('alamat'),
            'tempat_user' => $this->request->getVar('tempatlahir'),
            'lahir_user' => $this->request->getVar('tanggallahir'),
            // 'pass_user' => passwor($this->request->getVar('pass')),
            'pass_user' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'role' => "3",
            'created_at' => $today

        ]);

        return redirect()->to(base_url('/pages'))->withInput()->with('i', $data);
    }

    public function adduser()
    {

        if (!$this->validate(
            [
                'npm' => 'required|min_length[10]|is_unique[feb_user.npm_user]',
                'nama' => 'required',
                'email' => 'required|valid_email',
                'alamat' => 'required',
                'tempatlahir' => 'required',
                'tanggallahir' => 'required',
                'pass' => 'required',
                'passconf' => 'matches[pass]',
            ],
            [
                'npm' => [
                    'required' => 'NPM harus diisi',
                    'min_length' => 'NPM yang anda masukkan salah',
                    'is_unique' => 'NPM yang anda masukkan sudah terdaftar silahkan untuk melakukan reset password di pelayanan dengan membawa KTM',
                ],
                'nama' => [
                    'required' => 'Nama harus diisi',
                ],
                'email' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Masukkan email yang benar'
                ],
                'alamat' => [
                    'required' => 'Alamat harus diisi',
                ],
                'tempatlahir' => [
                    'required' => 'Tempat lahir harus diisi',
                ],
                'tanggallahir' => [
                    'required' => 'Tanggal lahir harus diisi',
                ],
                'pass' => [
                    'required' => 'Password harus diisi',
                ],
                'passconf' => [
                    'matches' => 'Password yang dimasukkan tidak sama',
                ]
            ]
        )) {
            return redirect()->to(base_url('/daftar'))->withInput();
        }

        $today = date("Y-m-d H:i:s");
        $simpanModel = new SimpanModel();
        $simpanModel->save([
            'npm_user' => $this->request->getVar('npm'),
            'nama_user' => $this->request->getVar('nama'),
            'email_user' => $this->request->getVar('email'),
            'jurusan_user' => $this->request->getVar('jurusan'),
            'alamat_user' => $this->request->getVar('alamat'),
            'tempat_user' => $this->request->getVar('tempatlahir'),
            'lahir_user' => $this->request->getVar('tanggallahir'),
            // 'pass_user' => passwor($this->request->getVar('pass')),
            'pass_user' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('adduser'),
            'created_at' => $today

        ]);

        return redirect()->to(base_url('/pengguna'))->withInput()->with('i', $data);
    }

    public function addprodi()
    {

        if (!$this->validate(
            [
                'nama_jurusan' => 'required',
                'kaprodi_jurusan' => 'required',
                'akreditasi_jurusan' => 'required',
                'sk_jurusan' => 'required',
               
            ],
            [
                'nama_jurusan' => [
                    'required' => 'Program Studi harus diisi',
                    'is_unique' => 'Program Studi yang anda masukkan sudah terdaftar',
                ],
                'kaprodi_jurusan' => [
                    'required' => 'Nama harus diisi',
                ],
                'akreditasi_jurusan' => [
                    'required' => 'Akreditasi harus diisi',
                 
                ],
                'sk_jurusan' => [
                    'required' => 'Sk Jurusan harus diisi',
                ]
            ]
        )) {
            return redirect()->to(base_url('/pages/prodi'))->withInput();
        }

        $prodiModel = new ProdiModel();
        $prodiModel->save([
            'nama_jurusan' => $this->request->getVar('nama_jurusan'),
            'kaprodi_jurusan' => $this->request->getVar('kaprodi_jurusan'),
            'akreditasi_jurusan' => $this->request->getVar('akreditasi_jurusan'),
            'sk_jurusan' => $this->request->getVar('sk_jurusan')
           

        ]);

        return redirect()->to(base_url('/pages/'))->withInput()->with('i', $data);
    }


    public function update($id_user)
    {
        $simpanModel = new SimpanModel();
        $data = [

            'nama_user' => $this->request->getVar('nama'),
            'email_user' => $this->request->getVar('email'),
            'jurusan_user' => $this->request->getVar('jurusan'),
            'alamat_user' => $this->request->getVar('alamat'),
            'tempat_user' => $this->request->getVar('tempatlahir'),
            'lahir_user' => $this->request->getVar('tanggallahir'),
            'ortu_user' => $this->request->getVar('ortu_user'),
            'kerja_user' => $this->request->getVar('kerja_user'),
            'semester_user' => $this->request->getVar('semester_user'),
            'akademik_user' => $this->request->getVar('akademik'),
            'pangkat_user' => $this->request->getVar('pangkat_user'),
            'skripsi_user' => $this->request->getVar('skripsi_user'),
            'institusi_user' => $this->request->getVar('institusi_user'),
            'alis_user' => $this->request->getVar('alis_user')
        ];

        $simpanModel->update($id_user, $data);
        session()->setFlashdata('msg', 'Data Berhasil Dirubah');
        return redirect()->to(base_url('/profil'))->withInput();
    }

    public function updatejurusan($id_jurusan)
    {
        $prodiModel = new ProdiModel();
        $data = [

            'nama_jurusan' => $this->request->getVar('nama_jurusan'),
            'kaprodi_jurusan' => $this->request->getVar('kaprodi_jurusan'),
            'akreditasi_jurusan' => $this->request->getVar('akreditasi_jurusan'),
            'sk_jurusan' => $this->request->getVar('sk_jurusan')
        ];

        $prodiModel->update($id_jurusan, $data);
        session()->setFlashdata('msg', 'Data Berhasil Dirubah');
        return redirect()->to(base_url('/prodi'))->withInput();
    }

    public function updatedekan($id_dekan)
    {
        $dekanModel = new DekanModel();
        $data = [

            'nama_dekan' => $this->request->getVar('nama_dekan'),
            'nidn_dekan' => $this->request->getVar('nidn_dekan')
           
        ];

        $dekanModel->update($id_dekan, $data);
        session()->setFlashdata('msg', 'Data Berhasil Dirubah');
        return redirect()->to(base_url('/dekan'))->withInput();
    }

    public function updatecuti($id_user)
    {
        $simpanModel = new SimpanModel();
        $data = [

            'nama_user' => $this->request->getVar('nama'),
           
            'jurusan_user' => $this->request->getVar('jurusan'),
          
            'semester_user' => $this->request->getVar('semester_user'),
            'akademik_user' => $this->request->getVar('akademik_user')
            
        ];

        $simpanModel->update($id_user, $data);
        session()->setFlashdata('msg', 'Data Berhasil Dirubah');
        return redirect()->to(base_url('/edit-cuti'))->withInput();
    }
    public function updateip($id_user)
    {
        $simpanModel = new SimpanModel();
        $data = [
            'nama_user' => $this->request->getVar('nama'),       
            'jurusan_user' => $this->request->getVar('jurusan'),
            'skripsi_user' => $this->request->getVar('skripsi'),
            'institusi_user' => $this->request->getVar('institusi_user'),
            'alis_user' => $this->request->getVar('alis_user')
        ];
        
        $simpanModel->update($id_user, $data);
        session()->setFlashdata('msg', 'Data Berhasil Dirubah');
         return redirect()->to(base_url('/ip'))->withInput();
    }
    public function login()
    {
        
        $npm = $this->request->getVar('npm');
        $pass =  $this->request->getVar('pass');
        $simpanModel = new SimpanModel();
        $ceklogin =  $simpanModel->where('npm_user', $npm)->first();
        $session = session();

        if ($ceklogin) {

            //  echo "anda berhasil login";
            // echo "-";
            // echo $pass;
            // echo "-";


            if (password_verify($pass, $ceklogin['pass_user'])) {
                // membuat session
                // $npm = $session->set('npm_user', $cek['npm_user']);

                $data = [
                    'id_user' => $ceklogin['id_user'],
                    'npm_user' => $ceklogin['npm_user'],
                    'nama_user' => $ceklogin['nama_user'],
                    'role' => $ceklogin['role'],
                    'logged_id' => TRUE

                ];
                //$session = \Config\Services::session($config);

                $session->set($data);
                if ($ceklogin['role']>2)
                {return redirect()->to(base_url('/surat'));
                } else {return redirect()->to(base_url('/dashboard'));}
                //echo "password anda berhasil";
            } else {
                //echo "password anda salah";
                // $session = session();
                $session->setFlashdata('msg', 'NPM atau Password yang anda masukkan salah');
                return redirect()->to(base_url('/login'));
            }
        } else {

            $session->setFlashdata('msg', 'NPM atau Password yang anda masukkan salah');
            return redirect()->to(base_url('/login'));
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    public function listuser($page = 'listuser')
    {
        if (!is_file(APPPATH . 'Views/mahasiswa/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $simpanModel = new SimpanModel();
        $jurusan =  $simpanModel->where('role', 3)->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        // $daftar = $this->daftarModel->where(
        //     'id_jurusan',
        //     $key
        // )->first();

        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'menu' => $menu,
            'logged_in' => $logged_in



        ];


        echo view('templates/head', $data);
        echo view('mahasiswa/' . $page, $data);
        echo view('templates/foot', $data);
    }

    public function daftarpengguna($page = 'user')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $simpanModel = new SimpanModel();
        $jurusan =  $simpanModel->where('role','2')->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        // $daftar = $this->daftarModel->where(
        //     'id_jurusan',
        //     $key
        // )->first();

        $data = [
            'title' => 'Data User',
            'mahasiswa' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'menu' => $menu,
            'logged_in' => $logged_in
        ];


        echo view('templates/head', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/foot', $data);
    }

    public function daftarprodi($page = 'prodi')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $simpanModel = new SimpanModel();
        $jurusan =  $simpanModel->where('role','2')->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $prodiModel = new ProdiModel();
        $prodi =  $prodiModel->orderBy('id_jurusan','ASC')->findAll();
      

        $data = [
            'title' => 'Data Prodi',
            'mahasiswa' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'menu' => $menu,
            'logged_in' => $logged_in,
            'prodi' => $prodi
        ];


        echo view('templates/head', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/foot', $data);
    }

    public function profil($page = 'profil')
    {

        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();

        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Profil Mahasiswa',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'menu' => $menu,
            'profil' => $profil
        ];


        echo view('templates/head', $data);
        echo view('mahasiswa/' . $page, $data);
        echo view('templates/foot', $data);
    }

    public function surat($page = 'surat')
    {
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $aktifModel = new AktifModel();
        $aktifkuliah = $aktifModel->selectCount('id_aktifkuliah');
        $menuModel = new MenuModel();
        $menu = $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();

        $data = [
            'title' => 'Pengajuan Surat',
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'menu' => $menu,
            'aktifkuliah' => $aktifkuliah


        ];
        echo view('templates/head', $data);
        echo view('mahasiswa/' . $page, $data);
        echo view('templates/foot', $data);
    }
    public function aktifkuliah($page = 'aktif-kuliah')
    {
        // $id_user = session()->get('id_user');
        // $npm_user = session()->get('npm_user');
        // $nama_user = session()->get('nama_user');
        // $role = session()->get('role');

        // $logged_in = session()->get('logged_in');

        // $data = [
        //     'title' => 'Pengajuan Surat',
        //     'id_user' => $id_user,
        //     'npm_user' => $npm_user,
        //     'nama_user' => $nama_user,
        //     'role' => $role,


        // ];

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $aktifModel = new AktifModel();
        $getnosurat = $aktifModel->where('Month(created_at)', date('m'))->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $dekanModel = new DekanModel();
        $dekan = $dekanModel->first();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'getnosurat' => $getnosurat,
            'menu' => $menu,
            'thakademik' => $thakademik,
            'dekan' => $dekan
        ];



        date_default_timezone_set('UTC');

        $day = explode("-", $profil['lahir_user']);
        // $day =  $profil['lahir_user'];
        $arday = array($day[2], $day[1], $day[0]);
        $day1 = implode("-", $arday);
        $jur = $profil['jurusan_user'];
        switch ($jur) {
            case 1:
                $jur = "Manajemen";

                break;
            case 2:
                $jur = "Akuntansi";

                break;
            case 3:
                $jur = "Bisnis Digital";
                break;
            case 4:
                $jur = "D3 - Manajemen Perpajakan";
                break;
            default:
                $jur = "anda belum memilih jurusan";
                break;
        }

        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $romawi = array(
            '01' => 'I',
            '02' => 'II',
            '03' => 'III',
            '04' => 'IV',
            '05' => 'V',
            '06' => 'VI',
            '07' => 'VII',
            '08' => 'VIII',
            '09' => 'IX',
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII',
        );
        $surat = COUNT($getnosurat) + 1;
        if (strlen($surat) <2 ) { $nosurat = "00$surat";} 
        if (strlen($surat) == 2 ) { $nosurat = "0$surat";}   if (strlen($surat) == 3 ) {$nosurat = $surat;}
        $romawi = $romawi[date('m')];
        $tahun = date('Y');
        $nomor = "$nosurat/K/A/FEB/UPS/OL/$romawi/$tahun";
        $today = date("Y-m-d H:i:s");
        $aktifModel = new AktifModel();
        $aktifModel->save([
            'npm_aktifkuliah' => $npm_user,
            'nama_aktifkuliah' => $nama_user,
            'no_aktifkuliah' => $nomor,
            'keterangan_aktifkuliah' => 'Surat Keterangan Aktif Kuliah(Tunjangan)',
            'created_at' => $today

        ]);
        $bil = $profil['semester_user']; // Inisialisasi variabel bil dengan nilai 10

        if ($bil % 2 == 0) { //Kondisi
            $sms = "Genap"; //Kondisi true
        } else {
            $sms = "Gasal"; //Kondisi true
        }
        $logo = base_url('/brand/upstegal.png');
        $logoOptions = new Options();
        $logoOptions->set('isRemoteEnabled', TRUE);
        $logoDom = new Dompdf($logoOptions);
        $html1 = '
        
            <table>
            <tr>
            <td><img src="./brand/upstegal.png" alt="" width="100" height="100" class="d-inline-block align-text-top"></td>
            <td align="center">YAYASAN PENDIDIKAN PANCASAKTI <br>
            UNIVERSITAS PANCASAKTI TEGAL <br>
               <strong size="18">FAKULTAS EKONOMI DAN BISNIS</strong><br>
               
               MANAJEMEN, AKUNTANSI, MANAJEMEN PERPAJAKAN, DAN BISNIS DIGITAL <br>
               Jl. Halmahera KM.1 Kota Tegal 52121 | Telp:(0283) 355720 | <br> Web:feb.upstegal.ac.id | Email:feb@upstegal.ac.id</td>
            </tr>
            </table>
       
        <hr>
<center>
    <strong>
        SURAT KETERANGAN

      
    </strong>
</center>
<center>
   Nomor : ' . $nomor . '
</center>
<br>
<br>
<p>Dekan Fakultas Ekonomi dan Bisnis Universitas Pancasakti Tegal menerangkan dengan
    sebenarnya bahwa :</p>


<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>' . $nama_user . '</td>
    </tr>
    <tr>
        <td>NPM</td>
        <td>:</td>
        <td>' . $npm_user . '</td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td>' . $jur . '</td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>:</td>
        <td>' . $profil['tempat_user'] . ', ' . $day1 . '</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>' . $profil['alamat_user'] . '</td>
    </tr>
</table>
<br>
<p>Adalah benar yang bersangkutan terdaftar sebagai mahasiswa Program Studi
' . $jur . ' Semester ' . $sms ." " . ' Tahun Akademik '.$thakademik['tahun_akademik'] .'.</p>
<p>Mahasiswa tersebut di atas adalah anak dari orang tua :</p>
<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>' . $profil['ortu_user'] . '</td>
    </tr>
    <tr>
        <td>Instansi</td>
        <td>:</td>
        <td>' . $profil['kerja_user'] . '</td>
    </tr>
    <tr>
        <td>Pangkat/Golongan</td>
        <td>:</td>
        <td>' . $profil['pangkat_user'] . '</td>
    </tr>
</table>
<br>
Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.
<br>
<br>
<table >
<tr>
<td width="200"></td>
<td><br><br><br>Tegal, ' .
            date('d') . ' ' . $bulan[date('m')] . ' ' . date('Y')

            . '</td>
</tr>
<tr>

<td width="200"></td>
<td align="top"> <strong>Dekan</strong></td>
</tr>
<tr>
<td></td>
<td height="75" ></td>
</tr>
<tr>
<td width="200"></td>
<td>'. $dekan["nama_dekan"] .'</td>
<tr>
<td width="200"></td>
<td>NIDN. '. $dekan["nidn_dekan"] .'</td>
</tr>
</tr>
</table>

';

        $Options = new Options();
        $Options->set('chroot', realpath(''));
        $dompdf = new Dompdf($Options);

        // $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html1);
       
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Surat Aktif Kuliah_' . $npm_user . '.pdf');
    }

    public function aktifkuliahnon($page = 'aktif-kuliah-non')
    {
        // $id_user = session()->get('id_user');
        // $npm_user = session()->get('npm_user');
        // $nama_user = session()->get('nama_user');
        // $role = session()->get('role');

        // $logged_in = session()->get('logged_in');

        // $data = [
        //     'title' => 'Pengajuan Surat',
        //     'id_user' => $id_user,
        //     'npm_user' => $npm_user,
        //     'nama_user' => $nama_user,
        //     'role' => $role,


        // ];

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $aktifModel = new AktifModel();
        $getnosurat = $aktifModel->where('Month(created_at)', date('m'))->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $dekanModel = new DekanModel();
        $dekan = $dekanModel->first();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'getnosurat' => $getnosurat,
            'menu' => $menu,
            'thakademik' => $thakademik,
            'dekan' => $dekan
        ];



        date_default_timezone_set('UTC');

        $day = explode("-", $profil['lahir_user']);
        // $day =  $profil['lahir_user'];
        $arday = array($day[2], $day[1], $day[0]);
        $day1 = implode("-", $arday);
        $jur = $profil['jurusan_user'];
        switch ($jur) {
            case 1:
                $jur = "Manajemen";

                break;
            case 2:
                $jur = "Akuntansi";

                break;
            case 3:
                $jur = "Bisnis Digital";
                break;
            case 4:
                $jur = "D3 - Manajemen Perpajakan";
                break;
            default:
                $jur = "anda belum memilih jurusan";
                break;
        }

        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $romawi = array(
            '01' => 'I',
            '02' => 'II',
            '03' => 'III',
            '04' => 'IV',
            '05' => 'V',
            '06' => 'VI',
            '07' => 'VII',
            '08' => 'VIII',
            '09' => 'IX',
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII',
        );
        $surat = COUNT($getnosurat) + 1;
        if (strlen($surat) < 2 ) { $nosurat = "00$surat";} 
        if (strlen($surat) == 2 ) { $nosurat = "0$surat";}   
        if (strlen($surat) == 3 ) {$nosurat = $surat;}
        $romawi = $romawi[date('m')];
        $tahun = date('Y');
        $nomor = "$nosurat/K/A/FEB/UPS/OL/$romawi/$tahun";
        $today = date("Y-m-d H:i:s");
        $aktifModel = new AktifModel();
        $aktifModel->save([
            'npm_aktifkuliah' => $npm_user,
            'nama_aktifkuliah' => $nama_user,
            'no_aktifkuliah' => $nomor,
            'keterangan_aktifkuliah' => 'Surat Keterangan Aktif Kuliah(Non-Tunjangan)',
            'created_at' => $today

        ]);
        $bil = $profil['semester_user']; // Inisialisasi variabel bil dengan nilai 10

        if ($bil % 2 == 0) { //Kondisi
            $sms = "Genap"; //Kondisi true
        } else {
            $sms = "Gasal"; //Kondisi true
        }
        $html1 = '
        
            <table>
            <tr>
            <td><img src="./brand/upstegal.png" alt="" width="100" height="100" class="d-inline-block align-text-top"></td>
            <td align="center">YAYASAN PENDIDIKAN PANCASAKTI <br>
            UNIVERSITAS PANCASAKTI TEGAL <br>
               <strong size="18">FAKULTAS EKONOMI DAN BISNIS</strong><br>
               
               MANAJEMEN, AKUNTANSI, MANAJEMEN PERPAJAKAN, DAN BISNIS DIGITAL <br>
               Jl. Halmahera KM.1 Kota Tegal 52121 | Telp:(0283) 355720 | <br> Web:feb.upstegal.ac.id | Email:feb@upstegal.ac.id</td>
            </tr>
            </table>
       
        <hr>
<center>
    <strong>
        SURAT KETERANGAN

      
    </strong>
</center>
<center>
   Nomor : ' . $nomor . '
</center>
<br><br>
<p>Dekan Fakultas Ekonomi dan Bisnis Universitas Pancasakti Tegal menerangkan dengan
    sebenarnya bahwa :</p>


<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>' . $nama_user . '</td>
    </tr>
    <tr>
        <td>NPM</td>
        <td>:</td>
        <td>' . $npm_user . '</td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td>' . $jur . '</td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>:</td>
        <td>' . $profil['tempat_user'] . ', ' . $day1 . '</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>' . $profil['alamat_user'] . '</td>
    </tr>
</table>
<br>
<p>Adalah benar yang bersangkutan terdaftar sebagai mahasiswa Program Studi
    ' . $jur . ' Semester ' . $sms . ' Tahun Akademik '.$thakademik['tahun_akademik'] .'.</p>

<br>
Demikian surat keterangan ini dibuat untuk dapat dipergunakan seperlunya.
<br>
<br>
<table >
<tr>
<td width="200"></td>
<td><br><br><br>Tegal, ' .
            date('d') . ' ' . $bulan[date('m')] . ' ' . date('Y')

            . '</td>
</tr>
<tr>

<td width="200"></td>
<td align="top"> <strong>Dekan</strong></td>
</tr>
<tr>
<td></td>
<td height="75" ></td>
</tr>
<tr>
<td width="200"></td>
<td>'. $dekan["nama_dekan"] .'</td>
<tr>
<td width="200"></td>
<td>NIDN. '. $dekan["nidn_dekan"].'</td>
</tr>
</tr>
</table>

';

       
        $Options = new Options();
        $Options->set('chroot', realpath(''));
        $dompdf = new Dompdf($Options);

        // $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html1);

        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Surat Aktif Kuliah_' . $npm_user . '.pdf');
    }

    public function selesaiteori($page = 'aktif-kuliah-non')
    {
        // $id_user = session()->get('id_user');
        // $npm_user = session()->get('npm_user');
        // $nama_user = session()->get('nama_user');
        // $role = session()->get('role');

        // $logged_in = session()->get('logged_in');

        // $data = [
        //     'title' => 'Pengajuan Surat',
        //     'id_user' => $id_user,
        //     'npm_user' => $npm_user,
        //     'nama_user' => $nama_user,
        //     'role' => $role,


        // ];

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $aktifModel = new AktifModel();
        $getnosurat = $aktifModel->where('Month(created_at)', date('m'))->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $dekanModel = new DekanModel();
        $dekan = $dekanModel->first();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'getnosurat' => $getnosurat,
            'menu' => $menu,
            'thakademik' => $thakademik,
            'dekan' => $dekan
        ];



        date_default_timezone_set('UTC');

        $day = explode("-", $profil['lahir_user']);
        // $day =  $profil['lahir_user'];
        $arday = array($day[2], $day[1], $day[0]);
        $day1 = implode("-", $arday);
        $jur = $profil['jurusan_user'];
        switch ($jur) {
            case 1:
                $jur = "Manajemen";

                break;
            case 2:
                $jur = "Akuntansi";

                break;
            case 3:
                $jur = "Bisnis Digital";
                break;
            case 4:
                $jur = "D3 - Manajemen Perpajakan";
                break;
            default:
                $jur = "anda belum memilih jurusan";
                break;
        }

        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $romawi = array(
            '01' => 'I',
            '02' => 'II',
            '03' => 'III',
            '04' => 'IV',
            '05' => 'V',
            '06' => 'VI',
            '07' => 'VII',
            '08' => 'VIII',
            '09' => 'IX',
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII',
        );
        $surat = COUNT($getnosurat) + 1;
        if (strlen($surat) < 2 ) { $nosurat = "00$surat";} 
        if (strlen($surat) == 2 ) { $nosurat = "0$surat";}   if (strlen($surat) == 3 ) {$nosurat = $surat;}
        $romawi = $romawi[date('m')];
        $tahun = date('Y');
        $nomor = "$nosurat/K/A/FEB/UPS/OL/$romawi/$tahun";
        $today = date("Y-m-d H:i:s");
        $aktifModel = new AktifModel();
        $aktifModel->save([
            'npm_aktifkuliah' => $npm_user,
            'nama_aktifkuliah' => $nama_user,
            'no_aktifkuliah' => $nomor,
            'keterangan_aktifkuliah' => 'Surat Keterangan Selesai Teori',
            'created_at' => $today

        ]);
        $bil = $profil['semester_user']; // Inisialisasi variabel bil dengan nilai 10

        if ($bil % 2 == 0) { //Kondisi
            $sms = "Genap"; //Kondisi true
        } else {
            $sms = "Gasal"; //Kondisi true
        }
        $html1 = '
        
            <table>
            <tr>
            <td><img src="./brand/upstegal.png" alt="" width="100" height="100" class="d-inline-block align-text-top"></td>
            <td align="center">YAYASAN PENDIDIKAN PANCASAKTI <br>
            UNIVERSITAS PANCASAKTI TEGAL <br>
               <strong size="18">FAKULTAS EKONOMI DAN BISNIS</strong><br>
               
               MANAJEMEN, AKUNTANSI, MANAJEMEN PERPAJAKAN, DAN BISNIS DIGITAL <br>
               Jl. Halmahera KM.1 Kota Tegal 52121 | Telp:(0283) 355720 | <br> Web:feb.upstegal.ac.id | Email:feb@upstegal.ac.id</td>
            </tr>
            </table>
       
        <hr>
<center>
    <strong>
        SURAT KETERANGAN

      
    </strong>
</center>
<center>
   Nomor : ' . $nomor . '
</center>
<br><br>
<p>Dekan Fakultas Ekonomi dan Bisnis Universitas Pancasakti Tegal menerangkan bahwa :</p>


<table >
  
    <tr>   
        <td width="50"></td>
        <td>Nama</td>
        <td>:</td>
        <td>' . $nama_user . '</td>
    </tr>
    <tr>
        <td width="50"></td>
        <td>NPM</td>
        <td>:</td>
        <td>' . $npm_user . '</td>
    </tr>
    <tr>
        <td width="50"></td>
        <td>Semester</td>
        <td>:</td>
        <td>' . $bil. '</td>
    </tr>
    <tr>
        <td width="50"></td>
        <td>Program Studi</td>
        <td>:</td>
        <td>' . $jur . '</td>
    </tr>
  
 
</table>

<p>dinyatakan selesai teori pada semester ' . $sms. ' Tahun Akademik '. $profil['akademik_user'].'</p>

<br>
Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
<br>
<br>
<table >
<tr>
<td width="200"></td>
<td><br><br><br>Tegal, ' .
            date('d') . ' ' . $bulan[date('m')] . ' ' . date('Y')

            . '</td>
</tr>
<tr>

<td width="200"></td>
<td align="top"> <strong>Dekan</strong></td>
</tr>
<tr>
<td></td>
<td height="75" ></td>
</tr>
<tr>
<td width="200"></td>
<td>'. $dekan["nama_dekan"].'</td>
<tr>
<td width="200"></td>
<td>NIDN. '. $dekan["nidn_dekan"].'</td>
</tr>
</tr>
</table>

';

        
        $Options = new Options();
        $Options->set('chroot', realpath(''));
        $dompdf = new Dompdf($Options);

        // $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html1);

        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Surat Selesai Teori_' . $npm_user . '.pdf');
    }


    public function ijinpenelitian($page = 'ijin-penelitian')
    {
        // $id_user = session()->get('id_user');
        // $npm_user = session()->get('npm_user');
        // $nama_user = session()->get('nama_user');
        // $role = session()->get('role');

        // $logged_in = session()->get('logged_in');

        // $data = [
        //     'title' => 'Pengajuan Surat',
        //     'id_user' => $id_user,
        //     'npm_user' => $npm_user,
        //     'nama_user' => $nama_user,
        //     'role' => $role,


        // ];

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();

        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $aktifModel = new AktifModel();
        $getnosurat = $aktifModel->where('Month(created_at)', date('m'))->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $dekanModel = new DekanModel();
        $dekan = $dekanModel->first();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'getnosurat' => $getnosurat,
            'menu' => $menu,
            'dekan' => $dekan
        ];



        date_default_timezone_set('UTC');

        $day = explode("-", $profil['lahir_user']);
        // $day =  $profil['lahir_user'];
        $arday = array($day[2], $day[1], $day[0]);
        $day1 = implode("-", $arday);
        $jur = $profil['jurusan_user'];
        switch ($jur) {
            case 1:
                $jur = "S1 - Manajemen";

                break;
            case 2:
                $jur = "S1 - Akuntansi";

                break;
            case 3:
                $jur = "S1 - Bisnis Digital";
                break;
            case 4:
                $jur = "D3 - Manajemen Perpajakan";
                break;
            default:
                $jur = "anda belum memilih jurusan";
                break;
        }

        $program = $profil['jurusan_user'];
        switch ($program) {
            case 1:
                $program = "sarjana (S1)";

                break;
            case 2:
                $program = "sarjana (S1)";

                break;
            case 3:
                $program = "sarjana (S1)";
                break;
            case 4:
                $program = "diploma (D3)";
                break;
            default:
                $program = "anda belum memilih jurusan";
                break;
        }


        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $romawi = array(
            '01' => 'I',
            '02' => 'II',
            '03' => 'III',
            '04' => 'IV',
            '05' => 'V',
            '06' => 'VI',
            '07' => 'VII',
            '08' => 'VIII',
            '09' => 'IX',
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII',
        );
        $surat = COUNT($getnosurat) + 1;
        if (strlen($surat) < 2 ) { $nosurat = "00$surat";} 
        if (strlen($surat) == 2 ) { $nosurat = "0$surat";} 
          if (strlen($surat) == 3 ) {$nosurat = $surat;}
        $romawi = $romawi[date('m')];
        $tahun = date('Y');
        $nomor = "$nosurat/K/A/FEB/UPS/OL/$romawi/$tahun";
        $today = date("Y-m-d H:i:s");
        $aktifModel = new AktifModel();
        $aktifModel->save([
            'npm_aktifkuliah' => $npm_user,
            'nama_aktifkuliah' => $nama_user,
            'no_aktifkuliah' => $nomor,
            'keterangan_aktifkuliah' => 'Surat Ijin Penelitian',
            'created_at' => $today

        ]);
        $bil = $profil['semester_user']; // Inisialisasi variabel bil dengan nilai 10

        if ($bil % 2 == 0) { //Kondisi
            $sms = "Genap"; //Kondisi true
        } else {
            $sms = "Gasal"; //Kondisi true
        }
        $html1 = '
        
            <table>
            <tr>
            <td><img src="./brand/upstegal.png" alt="" width="100" height="100" class="d-inline-block align-text-top"></td>
            <td align="center">YAYASAN PENDIDIKAN PANCASAKTI <br>
            UNIVERSITAS PANCASAKTI TEGAL <br>
               <strong size="18">FAKULTAS EKONOMI DAN BISNIS</strong><br>
               
               MANAJEMEN, AKUNTANSI, MANAJEMEN PERPAJAKAN, DAN BISNIS DIGITAL <br>
               Jl. Halmahera KM.1 Kota Tegal 52121 | Telp:(0283) 355720 | <br> Web:feb.upstegal.ac.id | Email:feb@upstegal.ac.id</td>
            </tr>
            </table>
       
        <hr>
      
<table style="width: 100%;" cellspacing="0" cellpadding="0">
        <tr style="">
            <td style="width: 70%;">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="width: 100px;">Nomor</td>
                        <td>:</td>
                        <td style="padding-left: 8px;">'.$nomor.'</td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Lampiran</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Perihal</td>
                        <td>:</td>
                        <td style="padding-left: 8px; font-weight: bold">Ijin Penelitian</td>
                    </tr>
                </table>
            </td>
            <td style="width: 30%;">
                <div style="float: right">Tegal, ' .
date('d') . ' ' . $bulan[date('m')] . ' ' . date('Y')

. '</div>
            </td>
        </tr>
    </table>
<br><br><br>
<table>
<tr>
<td>Kepada Yth.</td>
<td></td>
<td><strong>'. $profil['institusi_user'].' </strong></td>
</tr>
<tr>
<td></td>
<td></td>
<td>'.$profil['alis_user'].'</td>
</tr>
</table>
<br>
<table>
<tr>
<td width="70"></td>

<td align="justify"><br><br>Disampaikan dengan hormat, sebagai salah satu syarat untuk menyelesaikan program '.$program .'
Fakultas Ekonomi dan Bisnis mahasiswa di wajibkan mengadakan penelitian
sebagai bahan menyusun skripsi/laporan akhir.
Berkenaan dengan hal itu, kami mengajukan permohonan kepada Bapak/Ibu untuk membantu memberi data yang diperlukan dalam penelitian tersebut kepada mahasiswa :
</td>

</tr>
</table>

<br>

<table >
    <tr>
    <td width="100"></td>
        <td>Nama</td>
        <td>:</td>
        <td>' . $nama_user . '</td>
    </tr>
    <tr>
    <td width="70"></td>
        <td>NPM</td>
        <td>:</td>
        <td>' . $npm_user . '</td>
    </tr>
    <tr>
    <td width="70"></td>
        <td >Program Studi</td>
        <td>:</td>
        <td>' . $jur . '</td>
    </tr>
 
    <tr valign="top">
    <td width="70"  valign="top"></td>
        <td width="80"  valign="top">Judul Skripsi</td>
        <td  valign="top">:</td>
        <td  valign="top">' . $profil['skripsi_user'] . '</td>
    </tr>
   
</table>
<br>
<table>
<tr>
<td width="70"></td>

<td>Demikian, atas perhatian dan kerjasamanya kami sampaikan terimakasih<
</td>

</tr>
</table>

<br>



<br>
<br>
<table >
<tr>
<td width="250"></td>

</tr>
<tr>

<td width="200"></td>
<td align="top"> <strong>Dekan</strong></td>
</tr>
<tr>
<td></td>
<td height="75" ></td>
</tr>
<tr>
<td width="200"></td>
<td>'.$dekan["nama_dekan"].'</td>
<tr>
<td width="200"></td>
<td>NIDN. '. $dekan["nidn_dekan"].'</td>
</tr>
</tr>
</table>

';

        $Options = new Options();
        $Options->set('chroot', realpath(''));
        $dompdf = new Dompdf($Options);

        // $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html1);

        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Ijin Penelitian_' . $npm_user . '.pdf');
    }

    public function cutistudi($page = 'cuti-studi')
    {
        // $id_user = session()->get('id_user');
        // $npm_user = session()->get('npm_user');
        // $nama_user = session()->get('nama_user');
        // $role = session()->get('role');

        // $logged_in = session()->get('logged_in');

        // $data = [
        //     'title' => 'Pengajuan Surat',
        //     'id_user' => $id_user,
        //     'npm_user' => $npm_user,
        //     'nama_user' => $nama_user,
        //     'role' => $role,


        // ];

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $aktifModel = new AktifModel();
        $getnosurat = $aktifModel->where('Month(created_at)', date('m'))->findAll();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $dekanModel = new DekanModel();
        $dekan = $dekanModel->first();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'getnosurat' => $getnosurat,
            'menu' => $menu,
            'thakademik' => $thakademik,
            'dekan' => $dekan
        ];



        date_default_timezone_set('UTC');

        $day = explode("-", $profil['lahir_user']);
        // $day =  $profil['lahir_user'];
        $arday = array($day[2], $day[1], $day[0]);
        $day1 = implode("-", $arday);
        $jur = $profil['jurusan_user'];
        switch ($jur) {
            case 1:
                $jur = "Manajemen";

                break;
            case 2:
                $jur = "Akuntansi";

                break;
            case 3:
                $jur = "Bisnis Digital";
                break;
            case 4:
                $jur = "D3 - Manajemen Perpajakan";
                break;
            default:
                $jur = "anda belum memilih jurusan";
                break;
        }

        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $romawi = array(
            '01' => 'I',
            '02' => 'II',
            '03' => 'III',
            '04' => 'IV',
            '05' => 'V',
            '06' => 'VI',
            '07' => 'VII',
            '08' => 'VIII',
            '09' => 'IX',
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII',
        );
        $surat = COUNT($getnosurat) + 1;
        if (strlen($surat) < 2 ) { $nosurat = "00$surat";} 
        if (strlen($surat) == 2 ) { $nosurat = "0$surat";}   if (strlen($surat) == 3 ){$nosurat = $surat;}
        $romawi = $romawi[date('m')];
        $tahun = date('Y');
        $nomor = "$nosurat/K/E/FEB/UPS/OL/$romawi/$tahun";
        $today = date("Y-m-d H:i:s");
        $aktifModel = new AktifModel();
        $aktifModel->save([
            'npm_aktifkuliah' => $npm_user,
            'nama_aktifkuliah' => $nama_user,
            'no_aktifkuliah' => $nomor,
            'keterangan_aktifkuliah' => 'Surat Cuti Studi',
            'created_at' => $today

        ]);
        $bil = $profil['semester_user']; // Inisialisasi variabel bil dengan nilai 10

        if ($bil % 2 == 0) { //Kondisi
            $sms = "Genap"; //Kondisi true
        } else {
            $sms = "Gasal"; //Kondisi true
        }
        $html1 = '
        
            <table>
            <tr>
            <td><img src="./brand/upstegal.png" alt="" width="100" height="100" class="d-inline-block align-text-top"></td>
            <td align="center">YAYASAN PENDIDIKAN PANCASAKTI <br>
            UNIVERSITAS PANCASAKTI TEGAL <br>
               <strong size="18">FAKULTAS EKONOMI DAN BISNIS</strong><br>
               
               MANAJEMEN, AKUNTANSI, MANAJEMEN PERPAJAKAN, DAN BISNIS DIGITAL <br>
               Jl. Halmahera KM.1 Kota Tegal 52121 | Telp:(0283) 355720 | <br> Web:feb.upstegal.ac.id | Email:feb@upstegal.ac.id</td>
            </tr>
            </table>
       
        <hr>
        <table>
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td>' . $nomor . '</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td>Cuti Studi</td>
        </tr>
       
    </table>
<br>
<br>

<table>
    <tr>
        <td>Kepada Yth.</td>
        <td>:</td>
        <td>Rektor</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Universitas Pancasakti Tegal</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>di Tegal</td>
    </tr>
    
    
</table>
<br><br>
<center><strong><u>SURAT PERMOHONAN CUTI SEMENTARA</u></strong></center>

<p>Dengan ini saya :</p>
<table>
    <tr>
        <td width="40"></td>
        <td>Nama</td>
        <td>:</td>
        <td>' . $nama_user . '</td>
    </tr>
    <tr>
        <td width="40"></td>
        <td>NPM</td>
        <td>:</td>
        <td>' . $npm_user . '</td>
    </tr>
    <tr>
        <td width="40"></td>
        <td >Program Studi</td>
        <td>:</td>
        <td>' . $jur . '</td>
    </tr>
    <tr>
        <td width="40"></td>
        <td >Fakultas</td>
        <td>:</td>
        <td>Ekonomi dan Bisnis</td>
    </tr>
</table>
<br>
Mengajukan permohonan Cuti Studi Sementara (CSS) untuk:
<table>
    <tr>
        <td width="40"></td>
        <td>Semester</td>
        <td>:</td>
        <td>'. $profil['semester_user']. '</td>
    </tr>
    <tr>
        <td width="40"></td>
        <td>Tahun Akademik</td>
        <td>:</td>
        <td>' . $profil['akademik_user']. '</td>
    </tr>
   
</table>
<br>
berhubung karena :

<table >
    <tr>
        <td width="40"> &nbsp;</td>
        <td width="15" ><img width="30" src="./brand/kotak.png"></img></td>
        <td >Sakit dan perlu perawatan</td>
    </tr>
    <tr>
        <td width="40"> &nbsp;</td>
        <td width="15"> <img width="30" src="./brand/kotak.png" ></img></td>
        <td>Kerja Praktek / Dinas</td>
    </tr>
    <tr>
        <td width="40"> &nbsp;</td>
        <td width="15"><img width="30" src="./brand/kotak.png"></img> </td>
        <td>Keperluan lain yang bersifat pribadi</td>
    </tr>
</table>
<p>Demikian permohonan saya, atas perhatiannya saya sampaikan terimakasih.</p>
<br>
<table >

<tr>
<td width="200"></td>
<td>Tegal, ' .
            date('d') . ' ' . $bulan[date('m')] . ' ' . date('Y')

            . '</td>
</tr>
<tr>

<td width="200"></td>
<td align="top"> <strong>Dekan</strong></td>
</tr>
<tr>
<td></td>
<td height="75" ></td>
</tr>
<tr>
<td width="200"></td>
<td>'.$dekan["nama_dekan"].'</td>
<tr>
<td width="200"></td>
<td>NIDN. '.$dekan["nidn_dekan"].'</td>
</tr>
</tr>
</table>

';

        $html2 =  view('surat/' . $page, $data);
        $Options = new Options();
        $Options->set('chroot', realpath(''));
        $dompdf = new Dompdf($Options);

        // $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html1);

        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Surat Cuti Studi - ' . $npm_user . '.pdf');
    }
    public function isicuti($page = 'formcuti')
    {

        if (!is_file(APPPATH . 'Views/mahasiswa/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu,
            'thakademik' => $thakademik
        ];


        echo view('templates/head', $data);
        echo view('mahasiswa/' . $page, $data);
        echo view('templates/foot', $data);
    }
    public function isiteori($page = 'formteori')
    {

        if (!is_file(APPPATH . 'Views/mahasiswa/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu,
            'thakademik' => $thakademik
        ];


        echo view('templates/head', $data);
        echo view('mahasiswa/' . $page, $data);
        echo view('templates/foot', $data);
    }
    public function formcuti($page = 'cuti-studi')
    {

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu,
            'thakademik' => $thakademik
        ];


        echo view('templates/head', $data);
        echo view('surat/' . $page, $data);
        echo view('templates/foot', $data);
    }

    public function formteori($page = 'selesai-teori')
    {

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();
        $akdModel = new AkademikModel();
        $thakademik =  $akdModel->first();
        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu,
            'thakademik' => $thakademik
        ];


        echo view('templates/head', $data);
        echo view('surat/' . $page, $data);
        echo view('templates/foot', $data);
    }

    public function formsurat($page = 'aktif-kuliah')
    {

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();

        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu
        ];


        echo view('templates/head', $data);
        echo view('surat/' . $page, $data);
        echo view('templates/foot', $data);
    }
    public function formsuratnon($page = 'aktif-kuliah-non')
    {

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();

        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Aktif Kuliah',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu
        ];


        echo view('templates/head', $data);
        echo view('surat/' . $page, $data);
        echo view('templates/foot', $data);
    }
    public function formijinpenelitian($page = 'ijin-penelitian')
    {

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();

        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Ijin Penelitian',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu
        ];


        echo view('templates/head', $data);
        echo view('surat/' . $page, $data);
        echo view('templates/foot', $data);
    }
    public function editijinpenelitian($page = 'ijin-penelitian')
    {

        if (!is_file(APPPATH . 'Views/surat/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();

        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $data = [
            'title' => 'Surat keterangan Ijin Penelitian',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu
        ];


        echo view('templates/head', $data);
        echo view('mahasiswa/' . $page, $data);
        echo view('templates/foot', $data);
    }

    public function reset($user)
    {   
        $pass = "pancasakti";
        $simpanModel = new SimpanModel();
        $data = [
            
            'pass_user' => password_hash($pass, PASSWORD_DEFAULT),
           
        ];
        $simpanModel->update($user, $data);
        session()->setFlashdata('msg', 'Password Berhasil Dirubah menjadi pancasakti');
        return redirect()->to(base_url('/pengguna'))->withInput(); 
    }

    public function delete($user)
    {   
        
        $simpanModel = new SimpanModel();
        
        $simpanModel->delete(['id' => $user]);
        session()->setFlashdata('msg', 'Akun Berhasil Dihapus');
        return redirect()->to(base_url('pengguna'))->withInput(); 
    }

    public function dekan($page = 'dekan')
    {

        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $id_user = session()->get('id_user');
        $npm_user = session()->get('npm_user');
        $nama_user = session()->get('nama_user');
        $role = session()->get('role');
        $logged_in = session()->get('logged_in');
        $validasi =  \Config\Services::validation();

        $jurusan =  $this->daftarModel->findAll();
        $simpanModel = new SimpanModel();
        $profil = $simpanModel->where('npm_user', $npm_user)->first();
        $menuModel = new MenuModel();
        $menu =  $menuModel->where('role_menu', $role)->orderBy('urutan_menu','ASC')->findAll();
        $dekanModel = new DekanModel();
        $dekan = $dekanModel->first();
        $data = [
            'title' => 'Dekan FEB UPS',
            'jurusan' => $jurusan,
            'validasi' => $validasi,
            'id_user' => $id_user,
            'npm_user' => $npm_user,
            'nama_user' => $nama_user,
            'role' => $role,
            'logged_in' => $logged_in,
            'profil' => $profil,
            'menu' => $menu,
            'dekan' => $dekan
        ];


        echo view('templates/head', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/foot', $data);
    }


}
