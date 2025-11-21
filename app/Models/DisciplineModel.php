<?php

namespace App\Models;

use CodeIgniter\Model;

class DisciplineModel extends Model
{
    protected $table            = 'discipline_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    
    // --- BAGIAN INI YANG KEMUNGKINAN HILANG TADI ---
    // Daftar kolom yang diizinkan untuk diisi data
    protected $allowedFields    = [
        'taruna_id', 
        'type', 
        'category', 
        'description', 
        'points', 
        'reported_by'
    ];
    // -----------------------------------------------

    // Konfigurasi Waktu (Fix "Unknown Column updated_at")
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = null; // Kita matikan updated_at karena tidak ada di database

    // Custom Method
    public function getLogsByTaruna($tarunaID)
    {
        return $this->where('taruna_id', $tarunaID)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}