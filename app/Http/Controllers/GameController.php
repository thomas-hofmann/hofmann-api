<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GameController extends Controller
{
    public function index()
    {
        return response()->json(Game::all());
    }

    public function show($id)
    {
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Game not found'], 404);
        }

        return response()->json($game);
    }

    public function store(Request $request)
    {
        $game = Game::create($request->all());
        return response()->json($game, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Game not found'], 404);
        }

        $game->update($request->all());
        return response()->json($game);
    }

    public function destroy($id)
    {
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Game not found'], 404);
        }

        $game->delete();
        return response()->json(null, 204);
    }
}
