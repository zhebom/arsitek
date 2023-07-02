<?php

namespace App\Models;

use CodeIgniter\Model;

class pelatihanModel extends Model
{
    protected $table      = 'pelatihan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'pelatihan', 'slug' ,'kuota','gambar','tglpelatihan','endpendaftaran', 'updated_at' , 'deleted_at'];

    public function tampilData()
    {
        $sM = new pelatihanModel();
        return  $sM->query("SELECT * FROM pelatihan ")->getResult();
    }

    public function singleData($id)
    {
        $sM = new pelatihanModel();
        return  $sM->query("SELECT * FROM pelatihan where id = $id")->getResult();
    }

    public function deleteData($id)
    {
        $sM = new pelatihanModel();
        $sM->where('id', $id);
        $sM->delete();
    }
}
