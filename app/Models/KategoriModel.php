<?php

namespace App\Models;
use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_usaha';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_kategori'];
    public $timestamps = false;
}
