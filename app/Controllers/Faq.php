<?php

namespace App\Controllers;
use App\Models\faqModel;
use App\Models\situsModel;
class Faq extends BaseController
{
    public function index()
    {
        $situs = new situsModel();
        $faq = new faqModel();
        $data = [
            'title' => 'Frequently Asked Question',
            'faq' => $faq->tampilData(),
            'situs' => $situs->tampilData()
            
       ];
         echo view('pages/faq',$data);
    }
}
