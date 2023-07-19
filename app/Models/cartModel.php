<?php

namespace App\Models;

use CodeIgniter\Model;

class cartModel extends Model
{
    protected $table      = 'shopping_cart';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'id_pelatihan', 'id_user', 'biaya_pelatihan', 'total_pesanan','kode_pesanan','created_at', 'updated_at'];

    public function tampilData()
    {
        $sM = new cartModel();
        return  $sM->query("SELECT * FROM shopping_cart ORDER BY endpendaftaran DESC LIMIT 6")->getResult();
    }

    public function singleData($id)
    {
        $sM = new cartModel();
        return  $sM->query("SELECT * FROM shopping_cart where id_pelatihan = $id")->getResult();
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
