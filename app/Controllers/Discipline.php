<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DisciplineModel;
use App\Models\TarunaModel;

class Discipline extends BaseController
{
    public function store()
    {
        $db = \Config\Database::connect();
        $tarunaModel = new TarunaModel();

        // 1. AMBIL ID PELAPOR
        $reporterID = session()->get('user_id');
        if (!$reporterID) $reporterID = 1; // Fallback ke ID 1

        // 2. OLAH DATA POIN
        $type   = $this->request->getPost('type');
        $points = (int) $this->request->getPost('points');
        // Pastikan poin tidak nol
        if ($points <= 0) $points = 10; 
        
        // Logika: Demerit = Negatif, Merit = Positif
        $finalPoints = ($type === 'demerit') ? -abs($points) : abs($points);

        $tarunaID = $this->request->getPost('taruna_id');

        try {
            $db->transStart();

            // A. Insert Log (Manual)
            $db->table('discipline_logs')->insert([
                'taruna_id'   => $tarunaID,
                'type'        => $type,
                'category'    => $this->request->getPost('category'),
                'description' => $this->request->getPost('description') ?? '-', // Jangan NULL
                'points'      => $finalPoints,
                'reported_by' => $reporterID,
                'created_at'  => date('Y-m-d H:i:s')
            ]);

            // B. Update Taruna
            $taruna = $tarunaModel->find($tarunaID);
            if ($taruna) {
                $newTotal = $taruna->total_points + $finalPoints;
                $tarunaModel->update($tarunaID, ['total_points' => $newTotal]);
            }

            $db->transComplete();

            if ($db->transStatus() === FALSE) {
                throw new \Exception("Transaksi Database Gagal.");
            }

            return redirect()->back()->with('success', 'Laporan berhasil dicatat.');

        } catch (\Throwable $e) {
            // --- MODE DEBUG: TAMPILKAN ERROR DI LAYAR ---
            die("<h1>DISCIPLINE ERROR</h1><hr>Pesan: " . $e->getMessage());
        }
    }
}