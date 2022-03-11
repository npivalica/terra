<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseController
{
    public function index()
    {
        return view('pages.main.contact', $this->data);
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'content' => 'required'
        ], [
            'required.email' => 'The :attribute field is required.',
            'required.content' => 'The :attribute field is required.'
        ]);

        $details = [
            'email' => $request->email,
            'rating' => $request->rating,
            'content' => $request->content
        ];

       Mail::to('terrablog.office@gmail.com')->send(new SendMail(($details)));

       return redirect()->route('contact.index', $this->data)->with('success', 'Thanks for your message');
    }
}
