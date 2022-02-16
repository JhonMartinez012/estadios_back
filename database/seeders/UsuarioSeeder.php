<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder para llenar un usuario en la bd
        $usuario = new User();
        $usuario->name = "Jhon Alexander";
        $usuario->last_name = "Martinez Romero";
        $usuario->phone = "3221098877";
        $usuario->acerca = "Desarrollo de pagina para administrar los estadios de colombia";
        $usuario ->email = "jhon@mail.com";
        $usuario ->password = bcrypt("12341234");
        $usuario ->img = "/storage/SR8B72Z7Cj.jpeg";

        $usuario->save();
    }
}
