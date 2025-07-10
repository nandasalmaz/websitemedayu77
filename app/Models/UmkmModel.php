<?php

namespace App\Models;
use CodeIgniter\Model;

class UmkmModel extends Model
{
    protected $table = 'umkm';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nib_sku', 'nik', 'gambar', 'nama', 'jenis_usaha', 'kategori_id',
        'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'keterangan', 'logo', 'deskripsi'
    ];
}
