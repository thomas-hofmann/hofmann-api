<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarController extends Controller
{
    // Alle Autos holen
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    // Einzelnes Auto anzeigen
    public function show($id)
    {
        try {
            $car = Car::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        
        return response()->json($car);
    }

    // Neues Auto speichern
    public function store(Request $request)
    {
        // Optional: Validierung hinzufügen

        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    // Auto updaten
    public function update(Request $request, $id)
    {
        try {
            $car = Car::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->update($request->all());
        return response()->json($car);
    }

    // Auto löschen
    public function destroy($id)
    {
        try {
            $car = Car::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();
        return response()->json(null, 204);
    }
}