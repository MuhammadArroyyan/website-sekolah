<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarunaModel;

class Pasukan extends BaseController
{
    public function index()
    {
        $model = new TarunaModel();
        $db    = \Config\Database::connect();

        // Ambil Data dari URL (Query String)
        $keyword = $this->request->getGet('q');
        $classID = $this->request->getGet('class');

        // Ambil Daftar Kelas untuk Dropdown Filter
        $classes = $db->table('classes')->get()->getResult();

        $data = [
            'title'     => 'Database Pasukan',
            'pasukan'   => $model->searchPasukan($keyword, $classID),
            'pager'     => $model->pager,
            'keyword'   => $keyword,
            'classID'   => $classID,
            'classes'   => $classes
        ];

        return view('pasukan/index', $data);
    }
}