<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dato1 = User::create([
            'name' => 'Rosanyelis Mendoza',
            'email' => 'rosanyelismendoza@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ]);
        $rol =  Role::create(['name' => 'Desarrollador']);
        $dato1->assignRole($rol->id);

        $rol2 =  Role::create(['name' => 'Administrador']);
        $dato2 = User::create([
            'tipo' => 'Empresa',
            'name' => 'Administrador',
            'email' => 'administrador@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ]);
        $dato2->assignRole($rol2);

        $rol3 =   Role::create(['name' => 'Empresa']);
        $dato3 = User::create([
            'name' => 'Empresa',
            'email' => 'comercialrika@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
            'tipo' => 'Empresa',
            'empresa' => 'Comercial Rika',
            'actividad' => 'compra y venta de viveres',
            'telefono_empresa' => '809-555-5555',
            'correo_empresa' => 'comercialrika@example.com',
            'representante' => 'Rosanyelis Mendoza',
            'telefono_representante' => '809-555-5555',
            'correo_representante' => 'rosanyelismendoza@gmail.com',
            'provincia' => 'Santiago',
            'municipio' => 'Santiago',
            'sector' => 'Los Mina',
            'calle' => 'Calle 1',
            'numero' => '1',
            'referencia' => 'Cerca de la iglesia',
        ]);

        $dato3->assignRole($rol3);
        $rol4 =   Role::create(['name' => 'Empleado']);
    }
}
