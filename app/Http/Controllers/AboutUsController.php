<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class AboutUsController extends Controller
{
    public function about_us()
    {
        return view('front.about.about_us');
    }

    public function terms_conditions()
    {
        return view('front.about.terms_conditions');
    }

    public function privacy_policy()
    {
        return view('front.about.privacy_policy');
    }

    public function contact_us()
    {
        return view('front.about.contact_us');
    }

    public function contact_form_handler(Request $request)
    {
        $validatedData = $request->validate([
            'mail_from' => 'required|max:100',
            'mail_subject' => 'required|max:200',
            'mail_body' => 'required|max:1000'
        ]);

        $mail_from = $validatedData['mail_from'];
        $mail_subject = $validatedData['mail_subject'];
        $mail_body = $validatedData['mail_body'];

        Mail::to(env("MAIL_USERNAME"))->send(new ContactFormMail($mail_from, $mail_subject, $mail_body));

        session()->flash('success', 'We just recevied your message. Our team will respond you back asap.');
        return redirect()->route('contact_us');
    }
}