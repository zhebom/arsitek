<?php

namespace App\Controllers;

use App\Models\situsModel;
use App\Models\sosmedModel;
use App\Models\pelatihanModel;
use App\Models\faqModel;
use CodeIgniter\Database\Query;

class Pelatihan extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function blog()
    {
        $situs = new situsModel();
        $sosmed = new sosmedModel();
        $pelatihan = new pelatihanModel();
        $faq = new faqModel();

        $data = [
            'situs' => $situs->tampilData(),
            'sosmed' => $sosmed->tampilData(),
            'pelatihan' => $pelatihan->tampilData(),
            'faq' => $faq->tampilData()
        ];

        echo view('pages/pelatihan', $data);
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

    public function addCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(

            'id' => $this->request->getVar('id'),
            'qty' => 1,
            'price' => $this->request->getVar('price'),
            'name' => $this->request->getVar('name'),
            'option' => array(
                'gambar' => $this->request->getVar('gambar'),
                'slug' => $this->request->getVar('slug')
            )

        ));
        $slug = $this->request->getVar('slug');
        $nama = $this->request->getVar('name');
        session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Pelatihan ' . $nama . ' Berhasil Ditambahkan Ke Keranjang</div>');
        return redirect()->to(base_url('pelatihan/' . $slug));
    }

    public function cart()
    {

        $c = \Config\Services::cart();
        $cart = $c->contents();
        $total = $c->total();
        $situs = new situsModel();
        $sosmed = new sosmedModel();
        $pelatihan = new pelatihanModel();
        $faq = new faqModel();

        $data = [
            'situs' => $situs->tampilData(),
            'sosmed' => $sosmed->tampilData(),
            'pelatihan' => $pelatihan->tampilData(),
            'cart' => $cart,
            'total' => $total,
            'faq' => $faq->tampilData()
        ];

        echo view('pages/cart', $data);
    }

    public function delCart($rowid)
    {
        $cart = \Config\Services::cart();

        $cart->remove($rowid);

        session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Pelatihan Berhasil Dihapus</div>');
        return redirect()->to(base_url('cart'));
    }

    public function payment()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-cwHft3LdLPzlKt8TO-KLybjA';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => time(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        $situs = new situsModel();
        $sosmed = new sosmedModel();
        $pelatihan = new pelatihanModel();
        $faq = new faqModel();
        $data = [
            'situs' => $situs->tampilData(),
            'sosmed' => $sosmed->tampilData(),
            'pelatihan' => $pelatihan->tampilData(),
            'faq' => $faq->tampilData(),
            'token' => $snapToken
        ];
        echo view('pages/payment', $data);
    }
}
