<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarunaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $tarunaModel = new TarunaModel();

        // Mengambil data statistik untuk "Heads-Up Display"
        $data = [
            'title'       => 'Command Center',
            'total_taruna'=> $tarunaModel->countAllResults(),
            'top_taruna'  => $tarunaModel->orderBy('total_points', 'DESC')->first(),
            
            // Mengambil 5 Taruna dengan Pangkat Tertinggi untuk Leaderboard
            'elites'      => $tarunaModel->orderBy('total_points', 'DESC')->findAll(5),
            
            // Mengambil Data Terbaru (Dummy logic untuk contoh)
            'recent_activity' => [
                ['time' => '08:00', 'event' => 'Apel Pagi - Kompi Alpha Lengkap', 'type' => 'info'],
                ['time' => '09:15', 'event' => 'Pelanggaran - Terlambat Masuk Kelas', 'type' => 'alert'],
                ['time' => '10:30', 'event' => 'Setoran Hafalan - Jus 30 Selesai', 'type' => 'success'],
            ]
        ];

        return view('dashboard/overview', $data);
    }
}