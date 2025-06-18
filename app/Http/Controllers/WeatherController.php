<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        return response()->json(Weather::all());
    }

    public function show($id)
    {
        return response()->json(Weather::findOrFail($id));
    }

    public function store(Request $request)
    {
        $weather = Weather::create($request->all());
        return response()->json($weather, 201);
    }

    public function update(Request $request, $id)
    {
        $weather = Weather::findOrFail($id);
        $weather->update($request->all());
        return response()->json($weather);
    }

    public function destroy($id)
    {
        $weather = Weather::findOrFail($id);
        $weather->delete();
        return response()->json(null, 204);
    }
}