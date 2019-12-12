<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactStoreRequest;
use App\Http\Requests\Contact\ContactUpdateRequest;
use App\Mail\MyFirstMail;
use App\Models\Contact;
use Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::your()->get();
        return view('home',compact('contacts'));
    }
    public function create()
    {
        return view('contacts.create');
    }
    public function store(ContactStoreRequest $request)
    {
        $contact = new Contact;
        $contact->fill($request->all());
        $contact->user_id = Auth::id();
        $contact->save();
        $contact = $contact->load('user');
        Mail::to($request->email)->send(new MyFirstMail($contact));
        return redirect()
        ->route('contacts.show',[$contact->id])
        ->with(['success' => 'send contact successfull']);
    }
    public function edit($id)
    {
        $contact = Contact::your()->where('id',$id)->first();

        return view('contacts.edit',compact('contact'));
    }
    public function update(ContactUpdateRequest $request,$id)
    {
        $contact = Contact::your()->where('id',$id)->first();
        $contact->fill($request->all())->save();
        return redirect()
        ->route('contacts.show',[$contact->id])
        ->with(['success' => 'update contact successfull']);
    }
    public function show($id)
    {
        $contact = Contact::your()->where('id',$id)->first();
        if (!$contact) {
            abort(404);
        }
        return view('contacts.show',compact('contact'));
    }
    public function destroy($id)
    {
        Contact::your()->where('id',$id)->delete();
        return redirect()
        ->back()
        ->with(['success' => 'Contact has been moved to the Recycle Bin']);
    }
    public function hardDestroy($id)
    {
        Contact::your()->withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()
        ->with(['success' => 'remove contact successfully']);
    }
    public function restore($id)
    {
        Contact::your()->withTrashed()->where('id',$id)->first()->restore();
        return redirect()->back()
        ->with(['success' => 'restore contact successfully']);
    }
}
