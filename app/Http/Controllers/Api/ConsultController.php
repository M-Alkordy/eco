<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'service' => 'required|string',
            'message' => 'required|string',
        ]);

        Consult::create($data);
        return response()->json([
            'message' => 'successfully created'
        ]);
    }
}
