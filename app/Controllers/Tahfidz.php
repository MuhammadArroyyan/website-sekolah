<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TahfidzModel;

class Tahfidz extends BaseController
{
    public function store()
    {
        // 1. DEBUG: Cek apakah data terkirim?
        // dd($this->request->getPost()); // Hapus komentar ini jika ingin cek data mentah

        // 2. AMBIL ID USTADZ
        $ustadzID = session()->get('user_id');
        // Fallback: Jika session hilang/error, pakai ID 1 (Admin default)
        if (!$ustadzID) $ustadzID = 1;

        $db = \Config\Database::connect();

        try {
            // 3. EKSEKUSI MANUAL (BYPASS MODEL)
            // Kita isi semua kolom secara manual agar aman
            $data = [
                'taruna_id'   => $this->request->getPost('taruna_id'),
                'juz'         => $this->request->getPost('juz'),
                'surah'       => $this->request->getPost('surah'),
                'verses'      => $this->request->getPost('verses') ?? 'Full', // Default jika kosong
                'status'      => $this->request->getPost('status'),
                'notes'       => $this->request->getPost('notes') ?? '-',     // PENTING: Jangan biarkan NULL
                'ustadz_id'   => $ustadzID,
                'recorded_at' => date('Y-m-d H:i:s')
            ];

            $db->table('tahfidz_logs')->insert($data);

            return redirect()->back()->with('success', 'Hafalan berhasil disimpan.');

        } catch (\Throwable $e) {
            // --- MODE DEBUG: TAMPILKAN ERROR DI LAYAR ---
            die("<h1>TAHFIDZ ERROR</h1><hr>Pesan: " . $e->getMessage() . "<br>SQL Error? Cek tipe data di database.");
        }
    }
}