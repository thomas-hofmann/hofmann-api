<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MovieController extends Controller
{
    public function index()
    {
        return response()->json(Movie::all());
    }

    public function show($id)
    {
        try {
            $movie = Movie::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        return response()->json($movie);
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $movie = Movie::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $movie->update($request->all());
        return response()->json($movie);
    }

    public function destroy($id)
    {
        try {
            $movie = Movie::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $movie->delete();
        return response()->json(null, 204);
    }
}
