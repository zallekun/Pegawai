<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';         // nama tabel di database
    protected $primaryKey = 'id';            // primary key-nya

    protected $allowedFields = ['username', 'password', 'role']; // kolom yang bisa diisi
}
