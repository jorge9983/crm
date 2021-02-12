<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Empresa;
use App\Empleado;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); // Evita duplicar datos

        $usuario = new User();
        $usuario->name = "Administrador";
        $usuario->email = "admin@admin.com";
        $usuario->password = bcrypt("contraseña");
        $usuario->save();
    }
}
