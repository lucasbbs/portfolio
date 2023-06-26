<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AdminContact()
    {
        $contacts = Contact::get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact()
    {
        $route = route('admin.contact.store');
        return view('admin.contact.create', compact('route'));
    }

    public function AdminStoreContact(Request $request)
    {
        $validated = $request->validate(
            [
                'address' => 'required',
                'email' => 'required|unique:contacts|max:255',
            ],
            [
                'address.required' => 'Please Input Address',
                'email.required' => 'Please Input Email',
                'email.unique' => 'Email should be unique',
            ]
        );

        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully');
    }

    public function AdminEditContact($id)
    {
        $contact = Contact::find($id);
        $route = route('admin.contact.update', $id);
        return view('admin.contact.create', compact('contact', 'route'));
    }

    public function AdminUpdateContact(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'address' => 'required',
                'email' => 'required|max:255',
            ],
            [
                'address.required' => 'Please Input Address',
                'email.required' => 'Please Input Email',
            ]
        );

        Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Updated Successfully');
    }

    public function AdminDeleteContact($id)
    {
        Contact::find($id)->delete();
        return Redirect()->route('admin.contact')->with('success', 'Contact Deleted Successfully');
    }

    public function AdminMessage()
    {
        $messages = DB::table('contact_forms')->paginate(5);
        return view('admin.contact.message', compact('messages'));
    }

    public function AdminDeleteMessage($id)
    {
        DB::table('contact_forms')->where('id', $id)->delete();
        return Redirect()->route('admin.message')->with('success', 'Message Deleted Successfully');
    }
}