<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function generateWhatsAppURLs(Request $request)
    {
        $message = $request->input('message');
        $contacts = $request->input('contacts');

        $whatsappURLs = [];

        foreach ($contacts as $contact) {
            $encodedMessage = urlencode($message);
            $whatsappURL = "https://wa.me/{$contact->telp}?text={$encodedMessage}";
            $whatsappURLs[] = $whatsappURL;
        }

        return response()->json($whatsappURLs);
    }
}
