<?php

namespace App\Http\Controllers;

use App\Models\SportTeam;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SportTeamController extends Controller
{
    public function index()
    {
        return response()->json(SportTeam::all());
    }

    public function show($id)
    {
        try {
            $sportTeam = SportTeam::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Sport team not found'], 404);
        }

        return response()->json($sportTeam);
    }

    public function store(Request $request)
    {
        $sportTeam = SportTeam::create($request->all());
        return response()->json($sportTeam, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $sportTeam = SportTeam::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Sport team not found'], 404);
        }

        $sportTeam->update($request->all());
        return response()->json($sportTeam);
    }

    public function destroy($id)
    {
        try {
            $sportTeam = SportTeam::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Sport team not found'], 404);
        }

        $sportTeam->delete();
        return response()->json(null, 204);
    }
}
