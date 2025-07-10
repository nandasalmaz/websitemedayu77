<?php
namespace App\Controllers;

use App\Models\LogModel; // Tambahkan ini di atas

class AuthController extends BaseController
{
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === '12345') {
            session()->set('isAdmin', true);

            // ✅ Tambahkan log aktivitas
            $log = new LogModel();
            $log->insert([
                'aktivitas' => 'Admin login',
                'waktu' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/admin/dashboard');
        }

        session()->setFlashdata('error', 'Username atau Password salah!');
        return redirect()->to('login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

}
