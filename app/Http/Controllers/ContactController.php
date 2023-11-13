<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index() 
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5',
            'contact' => 'required|string|digits:9',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact.create')
                ->withErrors($validator)
                ->withInput();
        }

        $contact = Contact::create($request->all());

        return redirect()->route('index')
            ->with('success', 'Contact created successfully!');
    }

    public function edit() 
    {
        return view('contacts.edit');
    }

    public function delete()
    {

    }
}
