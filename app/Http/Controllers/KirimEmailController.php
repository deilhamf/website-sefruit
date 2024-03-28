<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class KirimEmailController extends Controller
{
    public function index()
    {
        return view('formemail');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'komentar' => ['required', 'string', 'confirmed'],
            'g-recaptcha-response' => 'recaptcha',
        ]);
    }

    public function kirim(Request $request)
    {
        
        $details = [
            'nama' => $request->nama,
            'email' => $request->email,
            'komentar' => $request->komentar
        ];

        Mail::to($request->email)->send(new MailSend($details));

        return "Email telah dikirim!";
    }
}