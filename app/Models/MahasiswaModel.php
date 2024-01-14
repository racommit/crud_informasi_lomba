<?php

namespace App\Models;

use CodeIgniter\Model;

class mahasiswaModel extends Model
{
    protected $table = 'data_mahasiswa';
    protected $allowedFields = ['id', 'nama_mahasiswa', 'kelas', 'nama_lomba', 'kategori', 'juara'];
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function hitungJumlahSemuaJuara()
    {
        return $this->selectCount('nama_mahasiswa')->get();
    }

    public function daftarLomba()
    {
        return $this->selectCount('nama_lomba')->get();
    }
}
