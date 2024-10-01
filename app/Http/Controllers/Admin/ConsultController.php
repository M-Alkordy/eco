<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:email-list');
    }

    public function index()
    {
        $consults = Consult::all();
        if ($consults->isEmpty()) {
            return redirect('/home')->with('status', 'No consults yet!');
        }
        return view('consults.index', compact('consults'));
    }

    public function show(Consult $consult)
    {
        return view('consults.show', compact('consult'));
    }

    public function destroy(Consult $consult)
    {
        $consult->delete();
        return redirect()->route('consults.index')->with('status', 'consult deleted successfully');
    }
}
