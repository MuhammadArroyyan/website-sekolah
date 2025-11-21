<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table            = 'guru';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['user_id', 'nama_lengkap', 'nip', 'jabatan'];
    protected $useTimestamps    = true;

    public function getGuruLengkap()
    {
        return $this->builder()
                    ->select('guru.*, users.username')
                    ->join('users', 'users.id = guru.user_id')
                    ->orderBy('nama_lengkap', 'ASC')
                    ->get()->getResult();
    }
}