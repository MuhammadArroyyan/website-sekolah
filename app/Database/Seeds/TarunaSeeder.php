<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TarunaSeeder extends Seeder
{
    public function run()
    {
        // Panggil Faker (Generator Data Palsu)
        $faker = \Faker\Factory::create('id_ID'); // Pakai locale Indonesia

        // -------------------------------------------------------
        // 1. BANGUN BASIS KELAS (PLATOON)
        // -------------------------------------------------------
        $classesData = [
            ['name' => 'X - Khalid Bin Walid (Alpha)', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'X - Salahuddin Al Ayyubi (Bravo)', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'XI - Thariq Bin Ziyad (Charlie)', 'created_at' => date('Y-m-d H:i:s')],
        ];
        
        // Insert Batch ke tabel classes
        $this->db->table('classes')->insertBatch($classesData);
        echo "✅ 3 Peleton Siap Tempur.\n";

        // -------------------------------------------------------
        // 2. BUAT AKUN KOMANDAN (ADMIN)
        // -------------------------------------------------------
        // Password default: '123456' (di-hash)
        $passwordHash = password_hash('123456', PASSWORD_DEFAULT);

        $adminData = [
            'username'      => 'komandan_pusat',
            'email'         => 'admin@taruna.sch.id',
            'password_hash' => $passwordHash,
            'role'          => 'komandan',
            'is_active'     => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ];
        $this->db->table('users')->insert($adminData);
        echo "✅ Akun Komandan Pusat Terdaftar (Pass: 123456).\n";

        // -------------------------------------------------------
        // 3. REKRUT 50 TARUNA (USERS + PROFIL)
        // -------------------------------------------------------
        $ranks = ['Prajurit Siswa', 'Kopral Taruna', 'Sersan Taruna'];
        
        for ($i = 0; $i < 50; $i++) {
            // A. Buat Akun Login
            $username = $faker->userName;
            $userData = [
                'username'      => $username,
                'email'         => $faker->email,
                'password_hash' => $passwordHash,
                'role'          => 'taruna',
                'is_active'     => 1,
                'created_at'    => date('Y-m-d H:i:s'),
            ];
            
            $this->db->table('users')->insert($userData);
            $userID = $this->db->insertID(); // Ambil ID user yang baru dibuat

            // B. Tentukan Nasib (Pangkat & Poin)
            // Poin acak antara 50 (hampir DO) sampai 200 (Sangat Berprestasi)
            $currentPoints = $faker->numberBetween(50, 200); 
            
            // Logika Pangkat berdasarkan Poin (Sederhana)
            $rank = 'Prajurit Siswa';
            if ($currentPoints > 150) $rank = 'Sersan Taruna';
            elseif ($currentPoints > 100) $rank = 'Kopral Taruna';

            // C. Buat Profil Taruna
            $tarunaData = [
                'user_id'      => $userID,
                'class_id'     => $faker->numberBetween(1, 3), // Random masuk kelas 1-3
                'nis'          => 'TN' . date('Y') . str_pad($i, 4, '0', STR_PAD_LEFT), // Format: TN20230001
                'full_name'    => $faker->name,
                'gender'       => $faker->randomElement(['L', 'P']),
                'rank_level'   => $rank,
                'total_points' => $currentPoints,
                'bio_motto'    => $faker->sentence(6), // Motto hidup pendek
                'created_at'   => date('Y-m-d H:i:s'),
            ];

            $this->db->table('taruna')->insert($tarunaData);
        }

        echo "✅ 50 Taruna Berhasil Direkrut & Ditempatkan.\n";
    }
}