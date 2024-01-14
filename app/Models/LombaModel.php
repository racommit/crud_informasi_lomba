<?php

namespace App\Models;

use CodeIgniter\Model;

class lombaModel extends Model
{
    protected $table = 'data_lomba_now';
    protected $allowedFields = ['id', 'event', 'namalomba','tanggal', 'keterangan'];
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function hitungJumlahSemuaLomba()
    {
        return $this->selectCount('namalomba')->get();
    }
}
