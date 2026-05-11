<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $primaryKey = 'id_horario';

    protected $fillable = [
        'id_curso',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'id_aula',
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class, 'id_horario');
    }
}
