<?php

namespace App\Models;

use CodeIgniter\Model;

class situsModel extends Model
{
    protected $table      = 'situs';
    protected $primaryKey = 'id_situs';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_situs', 'judul_situs','desc_situs','alamat','updated_at','deleted_at'];
    
    public function tampilData(){
        $sM = new situsModel();
        return  $sM->query("SELECT * FROM situs ")->getResult();
        
    }
}