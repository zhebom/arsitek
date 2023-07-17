<?php

namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id','user', 'nama','pass', 'role', 'created_at', 'updated_at'];

    public function tampilData()
    {
        $sM = new cartModel();
        return  $sM->query("SELECT * FROM pelatihan ORDER BY endpendaftaran DESC LIMIT 6")->getResult();
    }

    public function singleData($id)
    {
        $sM = new cartModel();
        return  $sM->query("SELECT * FROM pelatihan where id = $id")->getResult();
    }

    public function slugData($slug)
    {
        $sM = new cartModel();
        return  $sM->where(['slug'=> $slug])->first();
    }

    public function deleteData($id)
    {
        $sM = new cartModel();
        $sM->where('id', $id);
        $sM->delete();
    }

  
}
