<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id','user', 'nama','pass', 'role', 'created_at', 'updated_at'];

    public function tampilData()
    {
        $sM = new userModel();
        return  $sM->query("SELECT * FROM user ORDER BY endpendaftaran DESC LIMIT 6")->getResult();
    }

    public function singleData($id)
    {
        $sM = new userModel();
        return  $sM->query("SELECT * FROM user where id = $id")->getResult();
    }

    public function slugData($slug)
    {
        $sM = new userModel();
        return  $sM->where(['slug'=> $slug])->first();
    }

    public function deleteData($id)
    {
        $sM = new userModel();
        $sM->where('id', $id);
        $sM->delete();
    }

  
}
