<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Route;

class ContactFormController extends Controller
{
    public function Contact()
    {
        $contact = Contact::latest()->first();
        return view('pages.contact', compact('contact'));

    }

    public function ContactForm(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|max:255',
                'subject' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'Please Input Name',
                'email.required' => 'Please Input Email',
                'subject.required' => 'Please Input Subject',
                'message.required' => 'Please Input Message',
            ]
        );

        DB::table('contact_forms')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect(url()->previous() .'#contact')->cookie('success', 'Message Sent Successfully', 0.05);
    }
}
