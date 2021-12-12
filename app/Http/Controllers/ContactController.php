<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $title = "Contact";
        $contact = Contact::take(4)->orderBy('id', 'desc')->get();
        return view('contact.index', compact('title', 'contact'));
    }

    public function makeContact(Request $request)
    {
        Contact::create([
            'name'               => $request->name,
            'email'              => $request->email,
            'subject'            => $request->subject,
            'message'            => $request->message
        ]);
        return redirect()->back()->with('success','Message has send!');
    }

    public function listContact()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $i = 1;
        $title = "List";
        $contact = Contact::take(4)->orderBy('id', 'desc')->get();
        $contac = Contact::all();

        return view('contact.list', compact('contact', 'title', 'i', 'contac'));
    }

    public function delContact($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back()->with('failed','Messages has been deleted!');
    }

    public function showContact($id)
    {
        
        $contax = Contact::findOrfail($id);
        $title = "$contax->subject";

        // return dd($contax);
        return view('contact.show', compact('contax', 'title'));
    }
}
