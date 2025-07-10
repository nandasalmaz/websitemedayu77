<?php

namespace App\Controllers;

use App\Models\LogModel;
use App\Models\UmkmModel;
use App\Models\KategoriModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $logModel = new LogModel();
        $umkmModel = new UmkmModel();
        $kategoriModel = new KategoriModel(); // Tambahkan ini

        $aktivitas = $logModel->orderBy('waktu', 'DESC')->limit(5)->findAll();
        $totalUmkm = $umkmModel->countAll();
        $totalKategori = $kategoriModel->countAll(); // Ambil langsung dari tabel kategori_usaha

        return view('admin/dashboard', [
            'totalUmkm' => $totalUmkm,
            'totalKategori' => $totalKategori,
            'aktivitasTerbaru' => $aktivitas
        ]);
    }

    public function umkm()
    {
        $umkmModel = new UmkmModel();
        $kategoriModel = new KategoriModel();

        $search = $this->request->getGet('search');
        $filterKategori = $this->request->getGet('kategori');
        $filterRw = $this->request->getGet('rw');

        $builder = $umkmModel
            ->select('umkm.*, kategori_usaha.nama_kategori')
            ->join('kategori_usaha', 'kategori_usaha.id = umkm.kategori_id', 'left');

        if ($search) {
            $builder->groupStart()
                ->like('umkm.nama', $search)
                ->orLike('umkm.nik', $search)
                ->groupEnd();
        }

        if ($filterKategori) {
            $builder->where('umkm.kategori_id', $filterKategori);
        }

        if ($filterRw) {
            $builder->where('umkm.rw', $filterRw);
        }

        $data = [
            'umkm' => $builder->findAll(),
            'kategori' => $kategoriModel->findAll(),
            'search' => $search,
            'filterKategori' => $filterKategori,
            'filterRw' => $filterRw
        ];

        return view('admin/kelolaumkm', $data);
    }


}
