<?php

namespace App\Models;

use CodeIgniter\Model;

class midModel extends Model
{
    protected $table      = 'midtrans';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = false;
    // protected $allowedFields = ['id_situs', 'judul_situs','desc_situs','alamat','updated_at','deleted_at'];
    
    public function tampilData(){
        $sM = new midModel();
        return  $sM->query("SELECT * FROM midtrans ")->getResult();
       
        
    }
}