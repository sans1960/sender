<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\CountryCode;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country_codes = CountryCode::all();
        return view('contacts.create',compact('country_codes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
           
            'name' => 'required',
            'phone'=> 'required|max:12',
            'country_code_id' =>'required'
          ]);
          $contact = new Contact;
          $contact->name = $request->name;
          $contact->email = $request->email;
          $contact->phone = $request->phone;
          $contact->country_code_id = $request->country_code_id;
          $ipAdress = request()->ip();
          $contact->ipAdress = $ipAdress;
          $contact->save();
          session()->flash('notif.success', 'Contact created successfully!');
          return redirect()->route('contacts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
