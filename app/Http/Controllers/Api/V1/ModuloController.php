<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\ModuloRequest;
use App\Http\Resources\ModuloResource;


class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modulos =  ModuloResource::collection(Modulo::latest()->get());

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
    public function store(ModuloRequest $request)
    {
        $validatedData = $request->validated();

        $modulo = Modulo::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Modulo is added successfully.',
            'data' => new ModuloResource($modulo),
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
            'data' => new ModuloResource($modulo),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModuloRequest $request, Modulo $modulo)
    {

        $modulo->update($request->all());

        $response = [
            'status' => 'success',
            'message' => 'Modulo is updated successfully.',
            'data' => $modulo,
        ];
        return response()->json($response,200);
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
