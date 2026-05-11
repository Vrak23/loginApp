<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumnos = [
            [
                'nombre' => 'Luis',
                'apellidos' => 'Ramirez Torres',
                'fecha_nacimiento' => '2003-04-15',
                'dni' => '74851236',
                'direccion' => 'Av. Los Incas 145, Lima',
                'telefono' => '987654321',
                'email' => 'luis.ramirez@example.com',
                'estado_matricula' => 'matriculado',
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Fernandez Salas',
                'fecha_nacimiento' => '2002-11-08',
                'dni' => '73569841',
                'direccion' => 'Jr. Las Flores 320, Arequipa',
                'telefono' => '956874123',
                'email' => 'maria.fernandez@example.com',
                'estado_matricula' => 'matriculado',
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Vega Castillo',
                'fecha_nacimiento' => '2001-07-22',
                'dni' => '71234589',
                'direccion' => 'Calle Grau 742, Cusco',
                'telefono' => '965214785',
                'email' => 'carlos.vega@example.com',
                'estado_matricula' => 'matriculado',
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Morales Rojas',
                'fecha_nacimiento' => '2004-01-30',
                'dni' => '76985412',
                'direccion' => 'Av. Primavera 610, Trujillo',
                'telefono' => '943587126',
                'email' => 'ana.morales@example.com',
                'estado_matricula' => 'matriculado',
            ],
            [
                'nombre' => 'Diego',
                'apellidos' => 'Paredes Luna',
                'fecha_nacimiento' => '2002-09-17',
                'dni' => '70123654',
                'direccion' => 'Pasaje San Martin 128, Chiclayo',
                'telefono' => '932145678',
                'email' => 'diego.paredes@example.com',
                'estado_matricula' => 'inactivo',
            ],
        ];

        foreach ($alumnos as $alumno) {
            Alumno::updateOrCreate(
                ['dni' => $alumno['dni']],
                $alumno
            );
        }
    }
}
