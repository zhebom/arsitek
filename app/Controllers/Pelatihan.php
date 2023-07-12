<?php

namespace App\Controllers;
use App\Models\situsModel;
use App\Models\sosmedModel;
use App\Models\pelatihanModel;
use App\Models\faqModel;
use CodeIgniter\Database\Query;
class Pelatihan extends BaseController
{
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
}
