<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesor extends Model
{
    protected $table = 'profesores';

    protected $primaryKey = 'id_profesor';

    protected $fillable = [
        'nombre',
        'apellidos',
        'especialidad',
    ];

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class, 'id_profesor');
    }
}
