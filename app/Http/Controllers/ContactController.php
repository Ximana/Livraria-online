<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class ContactController extends Controller
{
     public function sendContactForm(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Dados do email
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        // Enviando o email
        Mail::send([], [], function ($message) use ($data) {
            $message->to('pauloximana@gmail.com')
                ->subject($data['subject'])
                ->setBody($this->buildHtmlBody($data), 'text/html');
        });

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    private function buildHtmlBody($data)
    {
        return '<h1>Contact Form Submission</h1>' .
               '<p><strong>Name:</strong> ' . $data['name'] . '</p>' .
               '<p><strong>Email:</strong> ' . $data['email'] . '</p>' .
               '<p><strong>Subject:</strong> ' . $data['subject'] . '</p>' .
               '<p><strong>Message:</strong><br>' . nl2br(e($data['message'])) . '</p>';
    }
}
