<?php

namespace Database\Seeders;

use App\Models\Profesor;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesores = [
            [
                'nombre' => 'Jorge',
                'apellidos' => 'Mendoza Vargas',
                'especialidad' => 'Desarrollo Web',
            ],
            [
                'nombre' => 'Patricia',
                'apellidos' => 'Quispe Huaman',
                'especialidad' => 'Base de Datos',
            ],
            [
                'nombre' => 'Roberto',
                'apellidos' => 'Salazar Medina',
                'especialidad' => 'Programacion',
            ],
            [
                'nombre' => 'Elena',
                'apellidos' => 'Castro Benites',
                'especialidad' => 'Ingenieria de Software',
            ],
            [
                'nombre' => 'Miguel',
                'apellidos' => 'Rivas Calderon',
                'especialidad' => 'Redes',
            ],
        ];

        foreach ($profesores as $profesor) {
            Profesor::updateOrCreate(
                [
                    'nombre' => $profesor['nombre'],
                    'apellidos' => $profesor['apellidos'],
                ],
                ['especialidad' => $profesor['especialidad']]
            );
        }
    }
}
