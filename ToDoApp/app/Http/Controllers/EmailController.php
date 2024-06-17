<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class EmailController extends Controller
{
    public function sendWelcomeEmail() {
        $toEmail = 'narvasadivine20@gmail.com';
        $message = 'Welcome to DailyDoer';
        $subject = 'Welcome email in Larvel using Gmail';

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject));

        dd($response);
    }
}
