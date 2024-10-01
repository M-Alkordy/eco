<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\SendMail;
use App\Mail\SendMessageToEndUser;
use App\Models\Support;
use Mail;

class MailController extends Controller
{
    public function mailform()
    {
        return view('mail.index');
    }
    public function maildata(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email',
            'massage' => 'required|string',
            'file' => 'file|mimes:png,jpg,svg,jpeg,pdf,gif,webp',
        ]);
        $name = $request->name;
        $email = $request->email;
        $mess = $request->massage;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('files', $fileName, 'public');
        }
        $support = Support::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->massage,
            'file' => $fileName,
            'replay' => false
        ]);
        $mailData = [
            'url' => 'https://sa.pioneers.network/',
        ];
        $senderMessage = "thanks for your message , we will reply you in later";
        Mail::to($email)->send(new
            SendMessageToEndUser($name, $senderMessage, $mailData));
        Mail::to('support@pioneers.network')->send(new
        SendMail($name, $email, $mess , 'https://sa.pioneers.network/files/' . $fileName));
        return response()->json(['message' => 'email send']);
    }
}
