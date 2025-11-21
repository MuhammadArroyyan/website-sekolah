<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FeatureLogs extends Migration
{
    public function up()
    {
        // 1. TABEL DISCIPLINE_LOGS (Pencatatan Pelanggaran/Prestasi)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'taruna_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'type' => ['type' => 'ENUM', 'constraint' => ['merit', 'demerit']], // Merit=Prestasi, Demerit=Pelanggaran
            'category' => ['type' => 'VARCHAR', 'constraint' => 100], // Contoh: "Keterlambatan", "Juara Lomba"
            'description' => ['type' => 'TEXT'],
            'points' => ['type' => 'INT', 'constraint' => 5], // Contoh: -10 atau +50
            'reported_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true], // Siapa yang lapor (User ID)
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('taruna_id', 'taruna', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('discipline_logs');

        // 2. TABEL TAHFIDZ_LOGS (Tracking Hafalan)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'taruna_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'juz' => ['type' => 'INT', 'constraint' => 2], // Juz 1-30
            'surah' => ['type' => 'VARCHAR', 'constraint' => 100],
            'verses' => ['type' => 'VARCHAR', 'constraint' => 50], // Contoh: "1-50"
            'status' => ['type' => 'ENUM', 'constraint' => ['lancar', 'mengulang', 'selesai']], 
            'notes' => ['type' => 'TEXT', 'null' => true],
            'ustadz_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true], // Penyetuju
            'recorded_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('taruna_id', 'taruna', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tahfidz_logs');
    }

    public function down()
    {
        $this->forge->dropTable('discipline_logs');
        $this->forge->dropTable('tahfidz_logs');
    }
}