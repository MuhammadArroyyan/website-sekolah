<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DisciplineModel;
use App\Models\TarunaModel;

class Discipline extends BaseController
{
    public function store()
    {
        // 1. Validasi Input
        if (!$this->validate([
            'taruna_id'   => 'required|integer',
            'type'        => 'required|in_list[merit,demerit]',
            'category'    => 'required|min_length[3]',
            'points'      => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. PERSIAPAN DATA
        $tarunaModel = new TarunaModel();
        $logModel    = new DisciplineModel();
        $db          = \Config\Database::connect();

        $tarunaID = $this->request->getPost('taruna_id');
        $type     = $this->request->getPost('type');
        $points   = (int) $this->request->getPost('points');
        
        // Paksa negatif jika Demerit, positif jika Merit
        $finalPoints = ($type === 'demerit') ? -abs($points) : abs($points);

        // --- SAFE MODE: CARI PELAPOR YANG VALID ---
        // Kita ambil 1 user pertama yang ada di tabel users sebagai "Pelapor"
        // Ini mencegah error Foreign Key jika ID 1 tidak ada.
        $adminUser = $db->table('users')->limit(1)->get()->getRow();
        $reporterID = $adminUser ? $adminUser->id : null;

        if (!$reporterID) {
            return redirect()->back()->with('error', 'CRITICAL ERROR: Tidak ada User di database untuk menjadi pelapor.');
        }
        // ------------------------------------------

        // 3. EKSEKUSI TRANSAKSI
        // 3. EKSEKUSI TRANSAKSI
        try {
            $db->transException(true)->transStart(); 

            // --- BYPASS CODE: KITA GUNAKAN $db->table() LANGSUNG ---
            // Ini mengabaikan aturan di Model dan langsung tembak ke tabel database
            $db->table('discipline_logs')->insert([
                'taruna_id'   => $tarunaID,
                'type'        => $type,
                'category'    => $this->request->getPost('category'),
                'description' => $this->request->getPost('description'),
                'points'      => $finalPoints,
                'reported_by' => $reporterID,
                'created_at'  => date('Y-m-d H:i:s') // Kita isi waktu manual
            ]);
            // -------------------------------------------------------

            // B. Update Total Poin Taruna
            $taruna = $tarunaModel->find($tarunaID);
            
            if(!$taruna) throw new \Exception("Data Taruna ID $tarunaID tidak ditemukan.");

            $newTotal = $taruna->total_points + $finalPoints;
            $tarunaModel->update($tarunaID, ['total_points' => $newTotal]);

            $db->transComplete();

        } catch (\Throwable $e) { 
            // Log error ke file sistem CI4 (writable/logs) agar programmer bisa cek nanti
            log_message('error', '[DISCIPLINE FAIL] ' . $e->getMessage());

            // Kembalikan user ke halaman sebelumnya dengan pesan error manusiawi
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem. Laporan gagal disimpan. (Kode: ' . $e->getCode() . ')');
        }

        if ($db->transStatus() === FALSE) {
            return redirect()->back()->with('error', 'Transaksi database digagalkan oleh sistem.');
        }

        return redirect()->back()->with('success', 'Laporan BERHASIL dicatat. Poin diperbarui.');
    }
}