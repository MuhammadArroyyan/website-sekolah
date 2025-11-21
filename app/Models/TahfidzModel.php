<?php

namespace App\Models;

use CodeIgniter\Model;

class TahfidzModel extends Model
{
    protected $table            = 'tahfidz_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';

    // 1. DAFTAR IZIN (Security Clearance)
    protected $allowedFields    = [
        'taruna_id', 
        'juz', 
        'surah', 
        'verses', 
        'status', 
        'notes', 
        'ustadz_id',
        'recorded_at'
    ];

    // 2. KONFIGURASI WAKTU (Time Sync)
    protected $useTimestamps = true;
    protected $createdField  = 'recorded_at'; // Sesuai nama kolom di database Anda
    protected $updatedField  = null;          // PENTING: Matikan ini karena kolom updated_at tidak ada
    protected $deletedField  = null;

    /**
     * --------------------------------------------------------------------------
     * TACTICAL MAP GENERATOR
     * --------------------------------------------------------------------------
     */
    public function getProgressMap($tarunaID)
    {
        $map = [];
        for ($i = 1; $i <= 30; $i++) {
            $map[$i] = 'locked';
        }

        $logs = $this->where('taruna_id', $tarunaID)
                     ->orderBy('recorded_at', 'ASC')
                     ->findAll();

        foreach ($logs as $log) {
            if ($log->status == 'selesai' || $log->status == 'lancar') {
                $map[$log->juz] = 'completed';
            } elseif ($log->status == 'mengulang') {
                $map[$log->juz] = 'progress';
            }
        }

        return $map;
    }

    public function countCompleted($tarunaID)
    {
        // Menghitung jumlah juz unik yang statusnya 'selesai'
        // Kita gunakan query builder manual agar lebih akurat
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT COUNT(DISTINCT juz) as total 
            FROM tahfidz_logs 
            WHERE taruna_id = ? AND status = 'selesai'
        ", [$tarunaID]);

        return $query->getRow()->total;
    }
}