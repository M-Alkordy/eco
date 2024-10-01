<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Replay;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:support-list');
    }

    public function index()
    {
        $supports = Support::all();
        if ($supports->isEmpty()) {
            return redirect('/home')->with('status', 'No consults yet!');
        }
        return view('supports.index', compact('supports'));
    }

    public function show(Support $support)
    {
        $replays = Replay::where('support_id', $support->id)->get();
        return view('supports.show', compact('support' , 'replays'));
    }

    public function replay(Support $support)
    {
        return view('supports.replay', compact('support'));
    }

    public function send(Support $support, Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string',
        ]);
        $message = $request->message;
        $support_id = $support->id;
        $replay = Replay::create([
            'message' => $message,
            'support_id' => $support_id,
        ]);
        $support->update(["replay" => true]);
        return redirect()->route('support.index');
    }

    public function destroy(Support $support)
    {
        $support->delete();
        return redirect()->route('support.index')->with('status', 'consult deleted successfully');
    }
}
