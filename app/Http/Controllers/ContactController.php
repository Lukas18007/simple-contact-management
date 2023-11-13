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

    public function show(string|int $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.details', compact('contact'));
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

    public function edit(string|int $id) 
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, string|int $id) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5',
            'contact' => 'required|string|digits:9',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact.edit', ["id" => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['name', 'contact', 'email']);

        Contact::whereId($id)->update($data);

        return redirect()->route('index')
            ->with('success', 'Contact updated successfully!');
    }

    public function delete(string|int $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('index')
            ->with('success', 'Contact deleted successfully!');
    }
}
