<?php

$path = storage_path('api_keys.json');
$apiKeysJson = file_get_contents($path);
$apiKeysData = json_decode($apiKeysJson, true);

return [
    $apiKeysData['booksAPI']['path'] => $apiKeysData['booksAPI']['key'] ?? null,
    $apiKeysData['carsAPI']['path'] => $apiKeysData['carsAPI']['key'] ?? null,
    $apiKeysData['weatherAPI']['path'] => $apiKeysData['weatherAPI']['key'] ?? null,
    $apiKeysData['dataAPI']['path'] => $apiKeysData['dataAPI']['keys'] ?? [], // mehrere keys als array
];