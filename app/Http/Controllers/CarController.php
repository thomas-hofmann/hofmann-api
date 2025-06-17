<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

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
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    // Neues Auto speichern
    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    // Auto updaten
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return response()->json($car);
    }

    // Auto löschen
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return response()->json(null, 204);
    }
}