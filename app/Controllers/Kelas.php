<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data = [
            'title'   => 'Manajemen Peleton',
            'classes' => $db->table('classes')->orderBy('name', 'ASC')->get()->getResult()
        ];
        return view('kelas/index', $data);
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $name = $this->request->getPost('name');
        
        if($name) {
            $db->table('classes')->insert([
                'name' => $name, 
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('success', 'Peleton baru berhasil dibentuk.');
        }
        return redirect()->back()->with('error', 'Nama kelas tidak boleh kosong.');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        // Cek apakah kelas dipakai siswa?
        $cek = $db->table('taruna')->where('class_id', $id)->countAllResults();
        
        if($cek > 0) {
            return redirect()->back()->with('error', 'GAGAL: Masih ada pasukan di kelas ini. Kosongkan dulu.');
        }

        $db->table('classes')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Peleton dibubarkan (Dihapus).');
    }
}