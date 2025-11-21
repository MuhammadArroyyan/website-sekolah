<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AcademicStructure extends Migration
{
    public function up()
    {
        // 1. TABEL CLASSES (Kelas/Peleton)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 50], // Contoh: X-Al-Fatih
            'homeroom_teacher_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('classes');

        // 2. TABEL TARUNA (Profile Lengkap)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true], // Relasi ke users
            'class_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true], // Relasi ke classes
            'nis' => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'full_name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'gender' => ['type' => 'ENUM', 'constraint' => ['L', 'P']],
            // WOW FACTOR: Gamifikasi Pangkat
            'rank_level' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'Prajurit Siswa'], 
            'total_points' => ['type' => 'INT', 'default' => 100], // Modal awal poin disiplin
            'bio_motto' => ['type' => 'TEXT', 'null' => true], // Untuk profil visual
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('class_id', 'classes', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('taruna');
    }

    public function down()
    {
        $this->forge->dropTable('taruna');
        $this->forge->dropTable('classes');
    }
}