<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarunaModel;
use App\Models\DisciplineModel;
use App\Models\TahfidzModel;

class Taruna extends BaseController
{
    public function detail($id)
    {
        $model = new TarunaModel();
        $disciplineModel = new DisciplineModel();
        $tahfidzModel = new TahfidzModel(); // <-- INSTANCE BARU

        $taruna = $model->getTarunaDossier($id);
        if (!$taruna) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // AMBIL DATA
        $logs = $disciplineModel->getLogsByTaruna($id);
        $juzMap = $tahfidzModel->getProgressMap($id); // <-- AMBIL PETA
        $totalHafalan = $tahfidzModel->countCompleted($id); // <-- HITUNG TOTAL

        $data = [
            'title'  => 'Personnel Dossier: ' . $taruna->full_name,
            'taruna' => $taruna,
            'logs'   => $logs,
            'juzMap' => $juzMap,       // <-- KIRIM KE VIEW
            'totalHafalan' => $totalHafalan // <-- KIRIM KE VIEW
        ];

        return view('taruna/detail', $data);
    }
}