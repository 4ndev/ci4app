<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['email', 'nombre', 'password', 'superadmin', 'admin', 'token', 'fecha_recuperacion', 'last_login'];
}
