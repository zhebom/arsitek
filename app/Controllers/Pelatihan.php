<?php

namespace App\Controllers;
use App\Models\situsModel;
use App\Models\sosmedModel;
use App\Models\pelatihanModel;
use App\Models\faqModel;
use CodeIgniter\Database\Query;
class Pelatihan extends BaseController
{
    public function __construct() {
        helper('form');
    }
    public function detailPelatihan($slug)
    {
        
        $situs = new situsModel();
        $sosmed = new sosmedModel();
        $pelatihan = new pelatihanModel();
        $faq = new faqModel();

        $data = [
            'situs' => $situs->tampilData(),
            'sosmed' => $sosmed->tampilData(),
            'pelatihan' => $pelatihan->slugData($slug),
            'faq' => $faq->tampilData()
        ];
  
         echo view('pages/detail-pelatihan', $data);
    }

    public function cekCart()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
       return $cart->destroy();
    }

    public function addCart(){
        $cart = \Config\Services::cart();
        $cart->insert(array(

            'id' => $this->request->getVar('id'),
            'qty' => 1,
            'price' => $this->request->getVar('price'),
            'name' => $this->request->getVar('name'),
            'option' => array(
                'gambar' => $this->request->getVar('gambar')
            )
           
        ));
        return redirect()->to(base_url('pelatihan/cek/cart'));
    }

}
