<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modulos = Modulo::latest()->get();

        if ($modulos->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No modules found!',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Modules are retrieved successfully.',
            'data' => $modulos,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:255|unique:modulos',
            'materia' => 'required|string|max:255',
            'h_semanales' => 'required|integer',
            'h_totales' => 'required|integer',
            'aula' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'especialidad_id' => 'required', // Asegúrate de que coincide con el nombre de la tabla real |exists:especialidades,id
            'estudio_id' => 'required', // Asegúrate de que coincide con el nombre de la tabla real |exists:estudios,id
        ]);

        $modulo = Modulo::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Modulo is added successfully.',
            'data' => $modulo,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Modulo $modulo)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Module is retrieved successfully.',
            'data' => $modulo,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modulo $modulo)
    {
        $validatedData = $request->validate([
            'codigo' => [
                'required',
                'string',
                'max:255',
                Rule::unique('modulos')->ignore($modulo->id),
            ],
            'materia' => 'required|string|max:255',
            'h_semanales' => 'required|integer',
            'h_totales' => 'required|integer',
            'turno' => ['required', 'string', Rule::in(['mañana', 'tarde'])],
            'aula' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'especialidad_id' => 'required|exists:especialidades,id', // Asegúrate de que coincide con el nombre de la tabla real
            'estudio_id' => 'required|exists:estudios,id', // Asegúrate de que coincide con el nombre de la tabla real
        ]);

        $modulo->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Modulo is updated successfully.',
            'data' => $modulo,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modulo $modulo)
    {
        $modulo->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Module is deleted successfully.',
        ], 200);
    }
}
