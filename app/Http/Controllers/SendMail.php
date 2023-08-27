<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMail extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'body' => 'Bu e-posta Laravel mail sınıfı kullanılarak gönderilmiştir.'
        ];

        Mail::to($request->email)->send(new SendMail($details));

        return "E-posta başarıyla gönderildi.";
    }
}
