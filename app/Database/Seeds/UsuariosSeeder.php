<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/** Sirve para crear un usuario de prueba, para crear este archivo con spark es:
 * php spark make:seeder Usuarios
 * Para crear este usuario en la db, ejecutar: php spark make:seeder Usuarios
 */

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'test@pipeline.es',
            'nombre' => 'Tester',
            'password' => password_hash('1234', PASSWORD_BCRYPT),
            'superadmin' => 1,
            'admin' => 0,
            'token' => null,
            'fecha_recuperacion' => null,
            'last_login' => null
        ];

        $this->db->table('usuarios')->insert($data);
    }
}
