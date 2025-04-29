<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('administradores')->insert([
            [
                'nombre' => 'Elmer',
                'apellidos' => 'Ruiz Ramirez',
                'dni' => '61805025',
                'cargo' => 'Administrador General',
                'foto_perfil' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAOVBMVEUAAAD///+np6ejo6OcnJyUlJTMzMzu7u7w8PDv7+/T09O3t7e1tbXV1dXq6urY2NjFxcW/v7+2trbExMSgoKBOt9btAAAB0klEQVR4nO3cMQ6DMBQEUdFjc//+U9vEoBKAwtn9a7J92m8U2BZZNpkAAAAAAAAAAAAAAAD8O8HVzH2nV7bh1D1WWt/fV1exO01tp9ePStZrOXz6vVaz6vjltXodZq/6ta7vpPmv9P7sX1LfZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS65bZKzvS64dr2XuXybZqvAAAAAElFTkSuQmCC',
                'usuario' => 'err@example.com', // Ahora es un correo
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lucía',
                'apellidos' => 'Fernández Prado',
                'dni' => '73218456',
                'cargo' => 'Administrador de Sistema',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CFjAAAAAXNSR0IArs4...',
                'usuario' => 'luciaprado@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Andrés',
                'apellidos' => 'Mendoza López',
                'dni' => '84561239',
                'cargo' => 'Administrador de Red',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAAj1+CFjAAAAAXNSR0IArs4...',
                'usuario' => 'andreslopez@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Sofía',
                'apellidos' => 'Ortega Salas',
                'dni' => '78451267',
                'cargo' => 'Administrador de Base de Datos',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CGgAAAAAXNSR0IArs4...',
                'usuario' => 'sofiaortega@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Javier',
                'apellidos' => 'Pérez Rodríguez',
                'dni' => '94567821',
                'cargo' => 'Administrador de Seguridad',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CGkAAAAAXNSR0IArs4...',
                'usuario' => 'javierperez@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Morales Chávez',
                'dni' => '85674320',
                'cargo' => 'Administrador de Aplicaciones',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CFkAAAAAXNSR0IArs4...',
                'usuario' => 'anamc@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Diego',
                'apellidos' => 'Torres Muñoz',
                'dni' => '76891234',
                'cargo' => 'Administrador de Infraestructura',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CGpAAAAAXNSR0IArs4...',
                'usuario' => 'diegotorres@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Valentina',
                'apellidos' => 'Castro Paredes',
                'dni' => '79123456',
                'cargo' => 'Administrador de Servidores',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CGqAAAAAXNSR0IArs4...',
                'usuario' => 'valentinacastro@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Miguel',
                'apellidos' => 'Ramos Núñez',
                'dni' => '81234567',
                'cargo' => 'Administrador de Sistemas Cloud',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CGtAAAAAXNSR0IArs4...',
                'usuario' => 'miguelramos@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camila',
                'apellidos' => 'Delgado Vela',
                'dni' => '83456712',
                'cargo' => 'Administrador de Soporte',
                'foto_perfil' => 'iVBORw0KGgoAAAANSUhEUgAAAakAAAHaCAIAAAA1+CGvAAAAAXNSR0IArs4...',
                'usuario' => 'camiladelgado@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
