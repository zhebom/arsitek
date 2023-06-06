<?php

namespace App\Models;

use CodeIgniter\Model;

class situsModel extends Model
{
    protected $table      = 'situs';
    protected $primaryKey = 'id_situs';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_situs', 'judul_situs','desc_situs','updated_at','deleted_at'];

}