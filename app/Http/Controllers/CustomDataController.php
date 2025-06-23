<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomData;
use Illuminate\Support\Facades\Log;

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
        $payload = $request->input('data') ?? $request->json()->all();

        $entry = CustomData::create([
            'client' => $client,
            'data' => $payload,
        ]);

        Log::info('API POST', [
            'client' => $client,
            'data' => $payload,
        ]);

        return response()->json($entry, 201);
    }

    public function show($id, Request $request)
    {
        $client = $request->api_client;

        $entry = CustomData::where('id', $id)
            ->where('client', $client)
            ->firstOrFail();

        return response()->json($entry);
    }

    public function update($id, Request $request)
    {
        $client = $request->api_client;
        $payload = $request->input('data') ?? $request->json()->all();

        $entry = CustomData::where('id', $id)
            ->where('client', $client)
            ->firstOrFail();

        $entry->update([
            'data' => $payload,
        ]);

        return response()->json($entry);
    }

    public function destroy($id, Request $request)
    {
        $client = $request->api_client;

        $entry = CustomData::where('id', $id)
            ->where('client', $client)
            ->firstOrFail();

        $entry->delete();

        return response()->json(['message' => 'Deleted']);
    }
}