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

    protected $table = 'modulos';

    public function especialidad() //Relación 1:1
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function estudio() //Relación 1:1
    {
        return $this->belongsTo(Estudio::class);
    }
}
