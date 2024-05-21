<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UsuarioModel;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarios = new UsuarioModel();

        $usuarios->insertBatch([
            [
                'perfil'            => 1,
                'identificador'     => '2',
                'nombre'            => 'Elizabeth',
                'apaterno'          => 'Martinez',
                'amaterno'          => 'Lorenzo',
                'email'             => 'elizamar12@gmail.com',
                'password'          => password_hash('martlo12', PASSWORD_DEFAULT),
                'sexo'              => 'f',
                'fecha_nacimiento'   => '2002/11/12',
                'created_at'        => '2023-12-27 12:00:00'
            ]            
        ]);
    }
}
