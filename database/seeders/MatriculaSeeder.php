<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Horario;
use App\Models\Matricula;
use App\Models\Profesor;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matriculas = [
            [
                'dni_alumno' => '74851236',
                'codigo_curso' => 'DAW-301',
                'profesor' => ['nombre' => 'Jorge', 'apellidos' => 'Mendoza Vargas'],
                'dia_semana' => 'Lunes',
                'semestre' => '2026-I',
                'fecha_matricula' => '2026-03-10',
                'nota_final' => null,
                'estado' => 'cursando',
            ],
            [
                'dni_alumno' => '73569841',
                'codigo_curso' => 'BD-302',
                'profesor' => ['nombre' => 'Patricia', 'apellidos' => 'Quispe Huaman'],
                'dia_semana' => 'Martes',
                'semestre' => '2026-I',
                'fecha_matricula' => '2026-03-11',
                'nota_final' => null,
                'estado' => 'cursando',
            ],
            [
                'dni_alumno' => '71234589',
                'codigo_curso' => 'POO-203',
                'profesor' => ['nombre' => 'Roberto', 'apellidos' => 'Salazar Medina'],
                'dia_semana' => 'Miercoles',
                'semestre' => '2026-I',
                'fecha_matricula' => '2026-03-12',
                'nota_final' => null,
                'estado' => 'cursando',
            ],
            [
                'dni_alumno' => '76985412',
                'codigo_curso' => 'IS-304',
                'profesor' => ['nombre' => 'Elena', 'apellidos' => 'Castro Benites'],
                'dia_semana' => 'Jueves',
                'semestre' => '2026-I',
                'fecha_matricula' => '2026-03-13',
                'nota_final' => null,
                'estado' => 'cursando',
            ],
            [
                'dni_alumno' => '70123654',
                'codigo_curso' => 'RC-205',
                'profesor' => ['nombre' => 'Miguel', 'apellidos' => 'Rivas Calderon'],
                'dia_semana' => 'Viernes',
                'semestre' => '2026-I',
                'fecha_matricula' => '2026-03-14',
                'nota_final' => null,
                'estado' => 'cursando',
            ],
        ];

        foreach ($matriculas as $matricula) {
            $alumno = Alumno::where('dni', $matricula['dni_alumno'])->firstOrFail();
            $curso = Curso::where('codigo_curso', $matricula['codigo_curso'])->firstOrFail();
            $profesor = Profesor::where('nombre', $matricula['profesor']['nombre'])
                ->where('apellidos', $matricula['profesor']['apellidos'])
                ->firstOrFail();
            $horario = Horario::where('id_curso', $curso->id_curso)
                ->where('dia_semana', $matricula['dia_semana'])
                ->firstOrFail();

            Matricula::updateOrCreate(
                [
                    'id_alumno' => $alumno->id_alumno,
                    'id_curso' => $curso->id_curso,
                    'semestre' => $matricula['semestre'],
                ],
                [
                    'id_profesor' => $profesor->id_profesor,
                    'id_horario' => $horario->id_horario,
                    'fecha_matricula' => $matricula['fecha_matricula'],
                    'nota_final' => $matricula['nota_final'],
                    'estado' => $matricula['estado'],
                ]
            );
        }
    }
}
