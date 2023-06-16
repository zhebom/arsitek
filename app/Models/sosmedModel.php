<?php

namespace App\Models;

use CodeIgniter\Model;

class sosmedModel extends Model
{
    protected $table      = 'sosmed';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'nama','link','logo','updated_at','deleted_at'];
    
    public function tampilData(){
        $sM = new sosmedModel();
        return  $sM->query("SELECT * FROM sosmed ")->getResult();
        
    }

    public function deleteData($id){
        $sM = new sosmedModel();
        $sM->where('id', $id);
        $sM->delete();
               
    }
}