<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    /**
     * Handle the incoming message and send it via email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Extract the validated message
        $message = $validatedData['message'];

        // Email recipient address from configuration or default
        $toEmail = config('mail.to.address', 'maambongchristianrey@gmail.com');

        // Send email using Laravel Mail facade
        Mail::raw($message, function($mail) use ($toEmail) {
            $mail->to($toEmail)
                 ->subject('New Message from Chatbox');
        });

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Message sent successfully!');
    }
}
