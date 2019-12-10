<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactStoreRequest;
use App\Http\Requests\Contact\ContactUpdateRequest;
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
        return view('contacts.create');
    }
    public function store(ContactStoreRequest $request)
    {
        $contact = new Contact;
        $contact->fill($request->all());
        $contact->user_id = Auth::id();
        $contact->save();
        return redirect()
        ->route('contacts.show',[$contact->id])
        ->with(['success' => 'send contact successfull']);
    }
    public function edit($id)
    {
        $contact = Contact::where('id',$id)->where('user_id',Auth::id())->first();

        return view('contacts.edit',compact('contact'));
    }
    public function update(ContactUpdateRequest $request,$id)
    {
        $contact = Contact::where('id',$id)->where('user_id',Auth::id())->first();
        $contact->fill($request->all())->save();
        return redirect()
        ->route('contacts.show',[$contact->id])
        ->with(['success' => 'update contact successfull']);
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            abort(404);
        }
        return view('contacts.show',compact('contact'));
    }
    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()
        ->back()
        ->with(['success' => 'Contact has been moved to the Recycle Bin']);
    }
    public function hardDestroy($id)
    {
        Contact::withTrashed()->forceDelete($id);
        return redirect()->back()
        ->with(['success' => 'remove contact successfully']);
    }
    public function restore($id)
    {
        Contact::withTrashed()->find($id)->restore();
        return redirect()->back()
        ->with(['success' => 'restore contact successfully']);
    }
}
