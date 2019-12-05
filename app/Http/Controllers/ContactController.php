<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactStoreRequest;
use App\Models\Contact;
use Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('contact.create');
    }
    public function store(ContactStoreRequest $request)
    {
        $contact = new Contact;
        $contact->fill($request->all());
        $contact->user_id = Auth::id();
        $contact->save();
        return redirect()->route('contact.show',[$contact->id]);
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            abort(404);
        }
        return view('contact.show',compact('contact'));
    }

}
