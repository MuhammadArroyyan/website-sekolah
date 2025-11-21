<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Taruna extends Entity
{
    // Mapping kolom database ke properti entity
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'total_points' => 'integer',
        'class_id'     => 'integer',
    ];

    /**
     * --------------------------------------------------------------------------
     * WOW FACTOR: Smart Rank Color Generator
     * --------------------------------------------------------------------------
     * Mengembalikan kode warna CSS berdasarkan level pangkat.
     * Tidak perlu if-else berantakan di View!
     */
    public function getRankColor(): string
    {
        // Logika Warna Khas SMAIT Taruna Ar Risalah
        $rank = strtolower($this->attributes['rank_level'] ?? '');

        if (str_contains($rank, 'komandan') || str_contains($rank, 'jenderal')) {
            return 'text-yellow-500 border-yellow-500'; // Golden Sand (Elite)
        } elseif (str_contains($rank, 'sersan') || str_contains($rank, 'kopral')) {
            return 'text-cyan-400 border-cyan-400'; // Tactical Cyan (Middle)
        }

        return 'text-slate-400 border-slate-400'; // Naval Blue/Grey (Prajurit)
    }

    /**
     * --------------------------------------------------------------------------
     * Avatar Handler
     * --------------------------------------------------------------------------
     * Jika siswa belum upload foto, tampilkan siluet default sesuai gender.
     */
    public function getAvatarUrl(): string
    {
        // Nanti kita buat folder ini di public/assets/images/taruna/
        $photo = $this->attributes['photo'] ?? null;

        if ($photo && file_exists(FCPATH . 'assets/images/taruna/' . $photo)) {
            return base_url('assets/images/taruna/' . $photo);
        }

        // Fallback ke siluet default (Aset UI Keren)
        $gender = $this->attributes['gender'] ?? 'L';
        return base_url('assets/images/ui/default-avatar-' . strtolower($gender) . '.png');
    }
}