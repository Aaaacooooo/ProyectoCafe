<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    // Asegurarse de que estos campos sean llenables (fillable) para creación y actualización
    protected $fillable = [
        'codigo', 'materia', 'h_semanales', 'h_totales', 'aula', 'user_id', 'especialidad_id', 'estudio_id'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function estudio()
    {
        return $this->belongsTo(Estudio::class);
    }
}
