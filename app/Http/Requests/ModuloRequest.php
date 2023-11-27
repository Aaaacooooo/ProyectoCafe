<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => 'required|string|max:255',
            'materia' => 'required|string|max:255',
            'h_semanales' => 'required|integer',
            'h_totales' => 'required|integer',
            'aula' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'especialidad_id' => 'required',
            'estudio_id' => 'required',
        ];


    }
}
