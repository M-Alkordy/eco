<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = client::orderBy('created_at', 'desc')->get();
        if ($clients->isEmpty()) {
            return response()->json(['message' => 'No clients', 'clients' => []]);
        }

        return response()->json([
            'clients' =>  $clients
        ]);
    }
}
