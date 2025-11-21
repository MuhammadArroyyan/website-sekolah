<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; // Kita belum punya ini, nanti kita buat/pakai db builder

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, lempar ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $db = \Config\Database::connect();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 1. Cari User di Database
        $user = $db->table('users')->where('username', $username)->get()->getRow();

        if ($user) {
            // 2. Verifikasi Password (Hash)
            if (password_verify($password, $user->password_hash)) {
                // 3. Set Session (Kartu Identitas Sementara)
                $sessionData = [
                    'user_id'    => $user->id,
                    'username'   => $user->username,
                    'role'       => $user->role, // Penting!
                    'isLoggedIn' => true
                ];
                session()->set($sessionData);

                // 4. LOGIKA PENGARAHAN (TRAFFIC CONTROL)
                if ($user->role == 'komandan' || $user->role == 'admin') {
                    // Komandan masuk ke Markas Pusat
                    return redirect()->to('/dashboard');
                } else {
                    // Taruna masuk ke Halaman Pribadi
                    return redirect()->to('/my-dossier');
                }
            } else {
                return redirect()->back()->with('error', 'ACCESS DENIED: Invalid Password.');
            }
        } else {
            return redirect()->back()->with('error', 'ACCESS DENIED: User not found.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}