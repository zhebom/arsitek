<?php

namespace App\Models;

use CodeIgniter\Model;

class faqModel extends Model
{
    protected $table      = 'faq';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'pertanyaan','keterangan','updated_at'];
    
    public function tampilData(){
        $sM = new faqModel();
        return  $sM->query("SELECT * FROM faq ")->getResult();
        
    }

    public function singleData($id){
        $sM = new faqModel();
        return  $sM->query("SELECT * FROM faq where id = $id")->getResult();
        
    }

    public function deleteData($id){
        $sM = new faqModel();
        $sM->where('id', $id);
        $sM->delete();
        
               
    }
}