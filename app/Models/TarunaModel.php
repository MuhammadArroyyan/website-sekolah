<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Taruna;

class TarunaModel extends Model
{
    protected $table            = 'taruna';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    // RETURN TYPE: Ini kuncinya! Data keluar sebagai Object Entity
    protected $returnType       = Taruna::class; 
    protected $useSoftDeletes   = false; // Ganti true jika ingin fitur "Sampah"

    // PROTEKSI: Hanya field ini yang boleh diisi via formulir
    protected $allowedFields    = [
        'user_id', 'class_id', 'nis', 'full_name', 
        'gender', 'rank_level', 'total_points', 'bio_motto', 'photo'
    ];

    // DATES
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * --------------------------------------------------------------------------
     * CUSTOM QUERY: Get Taruna With Class Info
     * --------------------------------------------------------------------------
     * Mengambil data taruna lengkap dengan nama kelasnya (JOIN).
     */
    public function getTarunaDossier($id = null)
    {
        $builder = $this->builder();
        $builder->select('taruna.*, classes.name as class_name, users.email');
        $builder->join('classes', 'classes.id = taruna.class_id', 'left');
        $builder->join('users', 'users.id = taruna.user_id', 'left');

        if ($id) {
            return $builder->where('taruna.id', $id)->get()->getFirstRow(Taruna::class);
        }

        return $builder->orderBy('rank_level', 'DESC')->get()->getResult(Taruna::class);
    }
    /**
     * --------------------------------------------------------------------------
     * TACTICAL SEARCH ENGINE
     * --------------------------------------------------------------------------
     * Mencari taruna berdasarkan keyword (Nama/NIS) dan Filter Kelas
     */
    public function searchPasukan($keyword = null, $classID = null)
    {
        $builder = $this->builder();
        $builder->select('taruna.*, classes.name as class_name');
        $builder->join('classes', 'classes.id = taruna.class_id', 'left');
        
        // Filter Keyword (Nama atau NIS)
        if ($keyword) {
            $builder->groupStart();
                $builder->like('full_name', $keyword);
                $builder->orLike('nis', $keyword);
            $builder->groupEnd();
        }

        // Filter Kelas
        if ($classID) {
            $builder->where('class_id', $classID);
        }

        // Urutkan: Pangkat tertinggi dulu, lalu Nama
        return $this->orderBy('total_points', 'DESC')
                    ->orderBy('full_name', 'ASC')
                    ->paginate(12, 'pasukan');
    }
    /**
     * --------------------------------------------------------------------------
     * LEADERBOARD INTEL
     * --------------------------------------------------------------------------
     * Mengambil data semua taruna + Hitungan Juz + Nama Kelas
     * Diurutkan berdasarkan Poin Tertinggi -> Lalu Juz Terbanyak
     */
    public function getLeaderboard()
    {
        $builder = $this->builder();
        $builder->select('taruna.*, classes.name as class_name');
        
        // Subquery untuk menghitung jumlah juz 'selesai' per siswa
        // Ini cara efisien agar tidak perlu looping query berulang-ulang
        $builder->select('(SELECT COUNT(DISTINCT juz) FROM tahfidz_logs WHERE tahfidz_logs.taruna_id = taruna.id AND status = "selesai") as juz_completed');
        
        $builder->join('classes', 'classes.id = taruna.class_id', 'left');
        
        // URUTAN RANKING:
        // 1. Poin Disiplin Tertinggi
        // 2. Jika poin sama, lihat Hafalan Terbanyak
        // 3. Jika masih sama, urutkan Nama (A-Z)
        $builder->orderBy('total_points', 'DESC');
        $builder->orderBy('juz_completed', 'DESC');
        $builder->orderBy('full_name', 'ASC');

        return $builder->get()->getResult(); // Return sebagai Array of Objects
    }
}