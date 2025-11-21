<?php

namespace App\Controllers;

use App\Models\TarunaModel;

class Home extends BaseController
{
    public function index()
    {
        // 1. Panggil Model Pasukan
        $model = new TarunaModel();

        // 2. Ambil Data Leaderboard (Menggunakan method yang sudah kita buat sebelumnya)
        // Kita ambil semua, tapi nanti di View cuma kita tampilkan Top 3
        $data = [
            'elites' => $model->getLeaderboard()
        ];

        // 3. Kirim ke Landing Page
        return view('landing_page', $data);
    }
}