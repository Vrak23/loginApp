<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = [
            [
                'nombre_curso' => 'Desarrollo de Aplicaciones Web',
                'codigo_curso' => 'DAW-301',
                'creditos' => 4,
                'descripcion' => 'Construccion de aplicaciones web con frontend, backend y persistencia de datos.',
            ],
            [
                'nombre_curso' => 'Base de Datos II',
                'codigo_curso' => 'BD-302',
                'creditos' => 3,
                'descripcion' => 'Modelado relacional avanzado, procedimientos almacenados y optimizacion de consultas.',
            ],
            [
                'nombre_curso' => 'Programacion Orientada a Objetos',
                'codigo_curso' => 'POO-203',
                'creditos' => 4,
                'descripcion' => 'Principios de objetos, herencia, polimorfismo y patrones basicos de diseno.',
            ],
            [
                'nombre_curso' => 'Ingenieria de Software',
                'codigo_curso' => 'IS-304',
                'creditos' => 3,
                'descripcion' => 'Analisis, diseno, gestion y pruebas de proyectos de software.',
            ],
            [
                'nombre_curso' => 'Redes y Comunicaciones',
                'codigo_curso' => 'RC-205',
                'creditos' => 3,
                'descripcion' => 'Fundamentos de redes, protocolos, direccionamiento y servicios de comunicacion.',
            ],
        ];

        foreach ($cursos as $curso) {
            Curso::updateOrCreate(
                ['codigo_curso' => $curso['codigo_curso']],
                $curso
            );
        }
    }
}
