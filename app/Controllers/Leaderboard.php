<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarunaModel;

class Leaderboard extends BaseController
{
    public function index()
    {
        $model = new TarunaModel();
        
        $data = [
            'title' => 'Global Rankings',
            'ranks' => $model->getLeaderboard(),
            // Kita kirim ID user yang sedang login untuk di-highlight nanti
            'my_id' => session()->get('role') == 'taruna' ? $this->getMyTarunaID() : null
        ];

        return view('leaderboard/index', $data);
    }

    // Helper untuk mencari ID Taruna dari User ID yang login
    private function getMyTarunaID()
    {
        $db = \Config\Database::connect();
        $user_id = session()->get('user_id');
        $row = $db->table('taruna')->where('user_id', $user_id)->get()->getRow();
        return $row ? $row->id : null;
    }
}