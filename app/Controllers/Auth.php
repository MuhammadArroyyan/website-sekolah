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
                // LOGIKA PENGARAHAN
                if ($user->role == 'komandan' || $user->role == 'admin' || $user->role == 'ustadz') {
                    return redirect()->to('/dashboard'); // Guru & Admin ke Dashboard
                } else {
                    return redirect()->to('/my-dossier'); // Taruna ke Dossier
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
    public function changePassword()
    {
        $data = ['title' => 'Update Security Credentials'];
        // Kita gunakan layout tactical agar tetap menyatu dengan dashboard
        return view('auth/change_password', $data);
    }

    // 2. Proses Update
    public function updatePassword()
    {
        // A. Validasi Input
        if (!$this->validate([
            'old_password'  => 'required',
            'new_password'  => 'required|min_length[6]',
            'conf_password' => 'required|matches[new_password]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $userID = session()->get('user_id');

        // B. Ambil Data User Saat Ini
        $user = $db->table('users')->where('id', $userID)->get()->getRow();

        // C. Cek Password Lama
        if (!password_verify($this->request->getPost('old_password'), $user->password_hash)) {
            return redirect()->back()->with('error', 'Password Lama SALAH. Akses ditolak.');
        }

        // D. Update Password Baru (Hash)
        $newHash = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);
        
        $db->table('users')->where('id', $userID)->update([
            'password_hash' => $newHash,
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        // TENTUKAN TUJUAN
        $role = session()->get('role');
        
        if ($role == 'komandan' || $role == 'admin' || $role == 'ustadz') {
            return redirect()->to('/dashboard')->with('success', 'Password diperbarui.');
        } else {
            return redirect()->to('/my-dossier')->with('success', 'Password diperbarui.');
        }
    }
}