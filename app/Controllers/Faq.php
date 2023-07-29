<?php

namespace App\Controllers;
use App\Models\faqModel;
use App\Models\situsModel;
use App\Models\sosmedModel;
class Faq extends BaseController
{
    public function index()
    {
        $situs = new situsModel();
        $faq = new faqModel();
        $sosmed = new sosmedModel();

        $data = [
            'title' => 'Frequently Asked Question',
            'faq' => $faq->tampilData(),
            'situs' => $situs->tampilData(),
            'sosmed' => $sosmed->tampilData()
            
       ];
         echo view('pages/faq',$data);
    }
}
