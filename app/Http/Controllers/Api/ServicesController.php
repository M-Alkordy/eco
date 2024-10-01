<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $Services = Service::orderBy('created_at', 'desc')->get();
        if ($Services->isEmpty()) {
            return response()->json(['message' => 'No Services', 'Services' => []]);
        }

        return response()->json([
            'Services' =>  $Services
        ]);
    }
}
