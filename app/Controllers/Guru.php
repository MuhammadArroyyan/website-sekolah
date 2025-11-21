<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class Guru extends BaseController
{
    // Method Utama: Menampilkan Halaman
    public function index()
    {
        $model = new GuruModel();
        
        // Cek apakah tabel guru sudah ada isinya
        // Jika Model belum dibuat, ini juga bisa error. 
        // Pastikan GuruModel.php juga sudah ada di app/Models/
        
        $data = [
            'title' => 'Officer Management',
            'guru'  => $model->getGuruLengkap()
        ];
        
        return view('guru/index', $data);
    }

    // Method Simpan Data
    public function store()
    {
        $db = \Config\Database::connect();
        $guruModel = new GuruModel();

        if (!$this->validate([
            'nama_lengkap' => 'required',
            'username'     => 'required|is_unique[users.username]',
            'password'     => 'required|min_length[6]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $db->transStart();

            // A. Buat User
            $userData = [
                'username'      => $this->request->getPost('username'),
                'email'         => $this->request->getPost('username') . '@taruna.sch.id',
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'          => 'ustadz', 
                'is_active'     => 1,
                'created_at'    => date('Y-m-d H:i:s')
            ];
            $db->table('users')->insert($userData);
            $newUserID = $db->insertID();

            // B. Buat Profil Guru
            $guruModel->insert([
                'user_id'      => $newUserID,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'nip'          => $this->request->getPost('nip'),
                'jabatan'      => $this->request->getPost('jabatan'),
            ]);

            $db->transComplete();
            return redirect()->back()->with('success', 'Perwira baru berhasil dilantik.');

        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    // Method Hapus Data
    public function delete($id)
    {
        $guruModel = new GuruModel();
        $db = \Config\Database::connect();

        $guru = $guruModel->find($id);
        if (!$guru) return redirect()->back()->with('error', 'Data tidak ditemukan.');

        $db->table('users')->where('id', $guru->user_id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}