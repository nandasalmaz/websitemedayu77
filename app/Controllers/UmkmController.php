<?php

namespace App\Controllers;

use App\Models\UmkmModel;
use App\Models\KategoriModel;

class UmkmController extends BaseController
{
    protected $umkmModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->umkmModel = new UmkmModel();
        $this->kategoriModel = new KategoriModel();
    }

    // 🔍 Daftar UMKM
    public function index()
    {
        $data['umkm'] = $this->umkmModel
            ->join('kategori_usaha', 'kategori_usaha.id = umkm.kategori_id', 'left')
            ->findAll();

        $data['kategori'] = $this->kategoriModel->findAll(); // ⬅️ Ini penting ditambahkan

        return view('admin/kelolaumkm', $data);
    }


    // 📄 Form Tambah / Edit UMKM
    public function form($id = null)
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['umkm'] = $id ? $this->umkmModel->find($id) : [];

        if ($id && !$data['umkm']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("UMKM dengan ID $id tidak ditemukan");
        }

        return view('admin/formumkm', $data);
    }

    // ➕ Simpan UMKM Baru
    public function tambah()
    {
        helper(['form', 'url']);

        $validationRules = [
            'nama' => 'required',
            'gambar' => [
                'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,5120]',
                'errors' => [
                    'uploaded' => 'Gambar wajib diunggah.',
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran maksimal 5MB.'
                ]
            ],
            'logo' => [
                'rules' => 'if_exist|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2048]',
                'errors' => [
                    'is_image' => 'Logo harus berupa gambar.',
                    'mime_in' => 'Format logo tidak didukung.',
                    'max_size' => 'Logo maksimal 2MB.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->getRequestData();

        // Upload gambar utama
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $gambarName);
            $data['gambar'] = $gambarName;
        }

        // Upload logo jika ada
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logoName = $logo->getRandomName();
            $logo->move(ROOTPATH . 'public/logo', $logoName);
            $data['logo'] = $logoName;
        }

        $this->umkmModel->insert($data);
        return redirect()->to('/admin/umkm')->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $rules = ['nama' => 'required'];

        $gambar = $this->request->getFile('gambar');
        $logo = $this->request->getFile('logo');

        if ($gambar && $gambar->getName()) {
            $rules['gambar'] = 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,5120]';
        }

        if ($logo && $logo->getName()) {
            $rules['logo'] = 'is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2048]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->getRequestData();

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $gambarName);
            $data['gambar'] = $gambarName;
        }

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logoName = $logo->getRandomName();
            $logo->move(ROOTPATH . 'public/logo', $logoName);
            $data['logo'] = $logoName;
        }

        $this->umkmModel->update($id, $data);
        return redirect()->to('/admin/umkm')->with('success', 'UMKM berhasil diperbarui!');
    }


    // ❌ Hapus UMKM
    public function hapus($id)
    {
        $this->umkmModel->delete($id);
        return redirect()->to('/admin/umkm')->with('success', 'UMKM berhasil dihapus!');
    }

    // 🔧 Ambil Data dari Form
    private function getRequestData()
    {
        return [
            'nama' => $this->request->getPost('nama'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'nib_sku' => $this->request->getPost('nib_sku'),
            'nik' => $this->request->getPost('nik'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'alamat' => $this->request->getPost('alamat'),
            'rt' => $this->request->getPost('rt'),
            'rw' => $this->request->getPost('rw'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
    }
}
