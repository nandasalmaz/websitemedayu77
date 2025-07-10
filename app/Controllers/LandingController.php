<?php

namespace App\Controllers;
use App\Models\UmkmModel;

class LandingController extends BaseController
{
    public function landing()
    {
        // Ini hanya halaman pembuka, tidak butuh data
        return view('landing');
    }

    public function umkm()
    {
        $model = new UmkmModel();
        $db = \Config\Database::connect();

        // Ambil daftar kategori dari tabel kategori_usaha (bukan dari tabel umkm)
        $kategori_list = $db->table('kategori_usaha')
            ->select('id, nama_kategori')
            ->get()
            ->getResultArray();

        // Ambil data RW unik dari tabel umkm
        $rw_list = $model->select('rw')->distinct()->orderBy('rw', 'asc')->findAll();

        // Filter input
        $search = $this->request->getGet('search');
        $kategori = $this->request->getGet('kategori');
        $rw = $this->request->getGet('rw');

        // Build query
        $builder = $model
            ->select('umkm.*, kategori_usaha.nama_kategori')
            ->join('kategori_usaha', 'kategori_usaha.id = umkm.kategori_id', 'left');

        if (!empty($search)) {
            $builder->like('umkm.nama', $search);
        }

        if (!empty($kategori) && $kategori !== 'all') {
            $builder->where('umkm.kategori_id', $kategori);
        }

        if (!empty($rw) && $rw !== 'all') {
            $builder->where('umkm.rw', $rw);
        }

        $builder->groupBy('umkm.id');
        $umkm = $builder->findAll();

        return view('umkm', [
            'umkm' => $umkm,
            'kategori_list' => $kategori_list,
            'rw_list' => $rw_list,
        ]);
    }
    public function detail_umkm($id)
    {
        $model = new \App\Models\UmkmModel();

        // Join dengan kategori
        $umkm = $model
            ->select('umkm.*, kategori_usaha.nama_kategori')
            ->join('kategori_usaha', 'kategori_usaha.id = umkm.kategori_id', 'left')
            ->find($id);

        if (!$umkm) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("UMKM tidak ditemukan.");
        }

        return view('detailumkm', ['umkm' => $umkm]);
    }



}
