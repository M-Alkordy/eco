<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:email-list');
    }

    public function index()
    {
        $emails = Email::all();
        if ($emails->isEmpty()) {
            return redirect('/home')->with('status', 'No Emails yet!');
        }
        return view('emails.index', compact('emails'));
    }

    public function show(Email $email)
    {
        return view('emails.show', compact('email'));
    }

    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->route('emails.index')->with('status', 'email deleted successfully');
    }
}

