<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'nombre_curso',
        'codigo_curso',
        'creditos',
        'descripcion',
    ];

    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class, 'id_curso');
    }

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class, 'id_curso');
    }
}
