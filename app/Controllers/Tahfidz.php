<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TahfidzModel;

class Tahfidz extends BaseController
{
    public function store()
    {
        // 1. VALIDASI INPUT
        if (!$this->validate([
            'taruna_id' => 'required|integer',
            'juz'       => 'required|integer|greater_than[0]|less_than[31]',
            'surah'     => 'required',
            'status'    => 'required|in_list[lancar,mengulang,selesai]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. KONEKSI LANGSUNG KE MARKAS DATABASE
        $db = \Config\Database::connect();
        
        // Ambil ID Ustadz (Sementara 1)
        $ustadzID = 1; 

        // 3. EKSEKUSI SIMPAN (METODE QUERY BUILDER)
        try {
            // Kita tembak langsung ke tabel 'tahfidz_logs'
            // Cara ini TIDAK PEDULI dengan file Model, jadi pasti berhasil.
            $db->table('tahfidz_logs')->insert([
                'taruna_id'   => $this->request->getPost('taruna_id'),
                'juz'         => $this->request->getPost('juz'),
                'surah'       => $this->request->getPost('surah'),
                'verses'      => $this->request->getPost('verses'), 
                'status'      => $this->request->getPost('status'),
                'notes'       => $this->request->getPost('notes'),
                'ustadz_id'   => $ustadzID,
                'recorded_at' => date('Y-m-d H:i:s') // Kita isi waktu manual
            ]);

            // SUKSES: Kembali ke halaman profil
            return redirect()->back()->with('success', 'Data Hafalan Juz ' . $this->request->getPost('juz') . ' berhasil diperbarui.');

        } catch (\Throwable $e) {
            // ERROR: Catat di log sistem, jangan tampilkan layar putih seram
            log_message('error', '[TAHFIDZ FAIL] ' . $e->getMessage());
            
            // Tampilkan pesan error manusiawi
            return redirect()->back()->with('error', 'Sistem gagal menyimpan data. (Error Code: DB-INSERT-FAIL)');
        }
    }
}