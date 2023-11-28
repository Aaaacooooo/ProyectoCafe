<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\V1\EspecialidadController;
use Illuminate\Http\Resources\Json\JsonResource;


class ModuloResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'materia' => $this->materia,
            'h_semanales' => $this->h_semanales,
            'h_totales' => $this->h_totales,
            'aula' => $this->aula,
            'user_id' => $this->user_id,
            'especialidad' => new EspecialidadResource($this->especialidad),
            'estudio_id' => $this->estudio_id,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        ];
    }
}
