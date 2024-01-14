<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id', 'email', 'username', 'password_hash'];
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function findIdByUsername($username)
    {
        return $this->select('id')->where('username', $username)->first();
    }


    protected $profilesTable = 'auth_groups_users';
    protected $allowedProfileFields = ['group_id','user_id'];

   public function findGroupByUser($username)
    {
        return $this->db->table($this->profilesTable)
            ->select('group_id')
            ->where('user_id', $username)
            ->get()
            ->getResult();
    }

}
