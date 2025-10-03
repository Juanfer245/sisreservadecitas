<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Consultorio;
use App\Models\Doctor;
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
            'user_id' => '2'
        ]);

        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor1',
            'apellidos' => 'Swift',
            'telefono' => '74757678',
            'licencia_medica' => '85848687',
            'especialidad' => 'Cirugia estetica',
            'user_id' => '3'
        ]);

        User::create([
            'name' => 'Doctor2',
            'email' => 'doctor2@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('doctor');
        Doctor::create([
            'nombres' => 'Doctor2',
            'apellidos' => 'Ormaza',
            'telefono' => '747585674',
            'licencia_medica' => '854235681',
            'especialidad' => 'Odontologia',
            'user_id' => '4'
        ]);

        User::create([
            'name' => 'Doctor3',
            'email' => 'doctor3@admin.com',
            'password' => Hash::make(value: '12345678')
        ])->assignRole('doctor');
        Doctor::create([
            'nombres' => 'Doctor3',
            'apellidos' => 'Valdez',
            'telefono' => '7424563',
            'licencia_medica' => '8586478898',
            'especialidad' => 'Cirugia Dental',
            'user_id' => '5'
        ]);

        Consultorio::create([
            'nombre' => 'Consultorio 1',
            'ubicacion' => 'Sector la carolina',
            'capacidad' => '1',
            'telefono' => '09868988',
            'especialidad' => 'Odontologia General',
            'estado'=>'ACTIVO',
        ]);
        Consultorio::create([
            'nombre' => 'Consultorio 2',
            'ubicacion' => 'Sector la carolina',
            'capacidad' => '1',
            'telefono' => '0921232425',
            'especialidad' => 'Odontologia Estetica',
            'estado'=>'ACTIVO',
        ]);
        Consultorio::create([
            'nombre' => 'Consultorio 3',
            'ubicacion' => 'Sector la carolina',
            'capacidad' => '1',
            'telefono' => '09142536',
            'especialidad' => 'Odontologia Reconstructiva',
            'estado'=>'ACTIVO',
        ]);

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
