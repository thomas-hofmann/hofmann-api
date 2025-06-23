<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomData;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomDataController extends Controller
{
    public function index(Request $request)
    {
        $client = $request->api_client;

        $data = CustomData::where('client', $client)->get();

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No data found'], 200);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $client = $request->api_client;

        // Manuelle Prüfung statt $request->validate(), um eigene Antwortstruktur zu definieren
        $category = $request->input('category');
        $payload = $request->input('data') ?? $request->json()->all();

        if (!$category) {
            return response()->json([
                'code' => 422,
                'message' => 'Category field is required.',
            ], 422);
        }

        if (!$payload || !is_array($payload)) {
            return response()->json([
                'code' => 422,
                'message' => 'Data must be a non-empty JSON object.',
            ], 422);
        }

        $entry = CustomData::create([
            'client' => $client,
            'category' => $category,
            'data' => $payload,
        ]);

        return response()->json($entry, 201);
    }

    public function show($id, Request $request)
    {
        $client = $request->api_client;

        try {
            $entry = CustomData::where('id', $id)
                ->where('client', $client)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Entry not found'], 404);
        }

        return response()->json($entry);
    }

    public function update($id, Request $request)
    {
        $client = $request->api_client;
        $payload = $request->input('data') ?? $request->json()->all();

        try {
            $entry = CustomData::where('id', $id)
                ->where('client', $client)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Entry not found'], 404);
        }

        $entry->update([
            'data' => $payload,
        ]);

        return response()->json($entry);
    }

    public function destroy($id, Request $request)
    {
        $client = $request->api_client;

        try {
            $entry = CustomData::where('id', $id)
                ->where('client', $client)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Entry not found'], 404);
        }

        $entry->delete();

        return response()->json(['message' => 'Deleted']);
    }

    public function getByCategory(Request $request, $category)
    {
        $client = $request->api_client;

        $data = CustomData::where('client', $client)
            ->where('category', $category)
            ->get();

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No data found for this category'], 200);
        }

        return response()->json($data);
    }
}
