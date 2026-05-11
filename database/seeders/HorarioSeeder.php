<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horarios = [
            [
                'codigo_curso' => 'DAW-301',
                'dia_semana' => 'Lunes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '10:00:00',
                'id_aula' => 'LAB-101',
            ],
            [
                'codigo_curso' => 'BD-302',
                'dia_semana' => 'Martes',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '12:00:00',
                'id_aula' => 'LAB-102',
            ],
            [
                'codigo_curso' => 'POO-203',
                'dia_semana' => 'Miercoles',
                'hora_inicio' => '14:00:00',
                'hora_fin' => '16:00:00',
                'id_aula' => 'A-203',
            ],
            [
                'codigo_curso' => 'IS-304',
                'dia_semana' => 'Jueves',
                'hora_inicio' => '16:00:00',
                'hora_fin' => '18:00:00',
                'id_aula' => 'A-204',
            ],
            [
                'codigo_curso' => 'RC-205',
                'dia_semana' => 'Viernes',
                'hora_inicio' => '08:00:00',
                'hora_fin' => '10:00:00',
                'id_aula' => 'LAB-103',
            ],
        ];

        foreach ($horarios as $horario) {
            $curso = Curso::where('codigo_curso', $horario['codigo_curso'])->firstOrFail();

            Horario::updateOrCreate(
                [
                    'id_curso' => $curso->id_curso,
                    'dia_semana' => $horario['dia_semana'],
                    'hora_inicio' => $horario['hora_inicio'],
                    'hora_fin' => $horario['hora_fin'],
                ],
                [
                    'id_aula' => $horario['id_aula'],
                ]
            );
        }
    }
}
