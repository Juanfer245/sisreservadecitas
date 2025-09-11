<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class,]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('admin');
        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('secretaria');

            Secretaria::create([
                'nombres' => 'Secretaria',
            'apellidos' => '1',
            'ci' => '1111111111',
            'celular' => '0999999999',
            'fecha_nacimiento' => '10/10/2000',
            'direccion' => 'Naciones Unidas',
            'user_id'=>'2'
            ]);

        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('doctor');
        User::create([
            'name' => 'Paciente1',
            'email' => 'paciente1@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('paciente');
        User::create([
            'name' => 'Usuario1',
            'email' => 'usuario1@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('usuario');

        $this->call([PacienteSeeder::class,]);
    }
}
