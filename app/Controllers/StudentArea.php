<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarunaModel;
use App\Models\DisciplineModel;
use App\Models\TahfidzModel;

class StudentArea extends BaseController
{
    public function index()
    {
        $userID = session()->get('user_id');
        
        // Cari data Taruna berdasarkan User ID yang login
        $tarunaModel = new TarunaModel();
        // Kita cari manual karena method getTarunaDossier butuh ID Taruna, bukan User ID
        $taruna = $tarunaModel->where('user_id', $userID)->first();

        if (!$taruna) {
            return "<h1>ERROR: Data Profil Taruna belum terhubung dengan Akun Login ini.</h1>";
        }

        // Gunakan method dossier untuk ambil nama kelas dll
        $fullData = $tarunaModel->getTarunaDossier($taruna->id);

        // Ambil Data Log & Tahfidz
        $disciplineModel = new DisciplineModel();
        $tahfidzModel    = new TahfidzModel();

        $data = [
            'title'        => 'My Dossier',
            'taruna'       => $fullData,
            'logs'         => $disciplineModel->getLogsByTaruna($taruna->id),
            'juzMap'       => $tahfidzModel->getProgressMap($taruna->id),
            'totalHafalan' => $tahfidzModel->countCompleted($taruna->id)
        ];

        // Kita gunakan view yang SAMA dengan detail taruna, 
        // tapi nanti kita sembunyikan tombol edit di View.
        return view('taruna/detail', $data);
    }
}