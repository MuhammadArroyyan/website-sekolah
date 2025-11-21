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
    // ----------------------------------------------------------------
    // FITUR EDIT PROFIL & UPLOAD
    // ----------------------------------------------------------------
    public function edit($id)
    {
        $model = new TarunaModel();
        $db = \Config\Database::connect();
        
        $data = [
            'title'   => 'Edit Dossier',
            'taruna'  => $model->find($id),
            'classes' => $db->table('classes')->get()->getResult() // Ambil daftar kelas untuk dropdown
        ];

        return view('taruna/edit', $data);
    }

    public function update($id)
    {
        $model = new TarunaModel();
        
        // 1. Validasi Input
        if (!$this->validate([
            'full_name' => 'required',
            'photo'     => 'is_image[photo]|max_size[photo,2048]|mime_in[photo,image/jpg,image/jpeg,image/png]', // Validasi Foto (Max 2MB)
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Siapkan Data Update
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'nis'       => $this->request->getPost('nis'),
            'class_id'  => $this->request->getPost('class_id'),
            'bio_motto' => $this->request->getPost('bio_motto'),
        ];

        // 3. Proses Upload Foto (Jika ada file yang diupload)
        $file = $this->request->getFile('photo');
        if ($file->isValid() && !$file->hasMoved()) {
            // Generate nama acak agar tidak bentrok (contoh: 12345_random.jpg)
            $newName = $file->getRandomName(); 
            // Pindahkan file ke folder public/assets/images/taruna
            $file->move('assets/images/taruna/', $newName); 
            // Simpan nama file ke database
            $data['photo'] = $newName; 
        }

        // 4. Eksekusi Update ke Database
        $model->update($id, $data);
        
        return redirect()->to('/taruna/' . $id)->with('success', 'Data personel berhasil diperbarui.');
    }
    public function printCard($id)
    {
        $model = new TarunaModel();
        $data['taruna'] = $model->getTarunaDossier($id);
        return view('taruna/print_card', $data);
    }
    public function create()
    {
        $db = \Config\Database::connect();
        $data = [
            'title'   => 'Rekrut Taruna Baru',
            'classes' => $db->table('classes')->get()->getResult()
        ];
        return view('taruna/create', $data);
    }

    // PROSES SIMPAN (USER + PROFILE)
    public function store()
    {
        $tarunaModel = new TarunaModel();
        $db = \Config\Database::connect();

        // 1. Validasi
        if (!$this->validate([
            'full_name' => 'required',
            'nis'       => 'required|is_unique[taruna.nis]', // NIS tidak boleh kembar
            'class_id'  => 'required',
            // Foto opsional saat daftar baru
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. TRANSAKSI DATABASE (Penting!)
        // Kita gunakan transaksi agar jika gagal buat profil, user login juga batal dibuat
        $db->transStart();

        // A. BUAT AKUN LOGIN OTOMATIS
        // Username = NIS, Password Default = 123456
        $userData = [
            'username'      => $this->request->getPost('nis'),
            'email'         => $this->request->getPost('nis') . '@taruna.sch.id', // Email dummy
            'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
            'role'          => 'taruna',
            'is_active'     => 1,
            'created_at'    => date('Y-m-d H:i:s')
        ];
        $db->table('users')->insert($userData);
        $newUserID = $db->insertID();

        // B. BUAT PROFIL TARUNA
        $tarunaData = [
            'user_id'      => $newUserID,
            'class_id'     => $this->request->getPost('class_id'),
            'nis'          => $this->request->getPost('nis'),
            'full_name'    => $this->request->getPost('full_name'),
            'gender'       => $this->request->getPost('gender'),
            'rank_level'   => 'Prajurit Siswa', // Default Rank
            'total_points' => 100, // Default Points
            'created_at'   => date('Y-m-d H:i:s')
        ];
        
        $tarunaModel->insert($tarunaData);
        
        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return redirect()->back()->with('error', 'Gagal merekrut taruna. Sistem Error.');
        }

        return redirect()->to('/pasukan')->with('success', 'Taruna berhasil direkrut. Akun Login: ' . $this->request->getPost('nis') . ' / Pass: 123456');
    }
}