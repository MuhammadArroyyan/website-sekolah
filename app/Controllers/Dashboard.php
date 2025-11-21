<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarunaModel;
use App\Models\DisciplineModel; // Tambahkan Model Log

class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('role') == 'taruna') {
            return redirect()->to('/my-dossier');
        }
        
        $tarunaModel = new TarunaModel();
        $logModel    = new DisciplineModel();

        // 1. Ambil Log Terbaru (Join dengan nama Taruna)
        // Kita ambil 3 aktivitas terakhir dari tabel discipline_logs
        $recentLogs = $logModel->select('discipline_logs.*, taruna.full_name')
                               ->join('taruna', 'taruna.id = discipline_logs.taruna_id')
                               ->orderBy('discipline_logs.created_at', 'DESC')
                               ->findAll(3);

        $data = [
            'title'           => 'Command Center',
            'total_taruna'    => $tarunaModel->countAllResults(),
            'top_taruna'      => $tarunaModel->orderBy('total_points', 'DESC')->first(),
            'elites'          => $tarunaModel->orderBy('total_points', 'DESC')->findAll(5),
            
            // Kirim data log asli ke View
            'recent_activity' => $recentLogs 
        ];

        return view('dashboard/overview', $data);
    }
}