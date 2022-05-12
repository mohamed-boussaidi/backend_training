<?php

namespace App\Http\Controllers\API;
use App\Mail\TestMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
          'title' => 'Mail from Surfside Media',
          'body'  => 'this is for testing mail using gmail.'
        ];
        Mail::to("islemamor38@gmail.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
