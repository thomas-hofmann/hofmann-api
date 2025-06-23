<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WeatherController extends Controller
{
    public function index()
    {
        return response()->json(Weather::all());
    }

    public function show($id)
    {
        try {
            $weather = Weather::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Weather record not found'], 404);
        }

        return response()->json($weather);
    }

    public function store(Request $request)
    {
        // Optional: Validierung hier ergänzen

        $weather = Weather::create($request->all());
        return response()->json($weather, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $weather = Weather::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Weather record not found'], 404);
        }

        $weather->update($request->all());
        return response()->json($weather);
    }

    public function destroy($id)
    {
        try {
            $weather = Weather::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Weather record not found'], 404);
        }

        $weather->delete();
        return response()->json(null, 204);
    }
}