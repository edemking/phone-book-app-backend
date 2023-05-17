<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\UpdateContactsRequest;
use App\Models\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::get();
        return $contacts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactsRequest $request)
    {
        try {
            Contacts::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_number' => $request->input('phone_number'),
            ]);
            return response()->json(['response' => 'Success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactsRequest  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactsRequest $request, Contacts $contacts, $id)
    {
        try {
            $contacts = Contacts::findOrFail($id);
            $contacts->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_number' => $request->input('phone_number'),
            ]);
            return response()->json(['response' => 'Success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Contacts $contacts)
    {
        try {
            $contact = Contacts::findOrFail($id);
            $contact->delete();
            return response()->json(['response' => 'Success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }

    public function delete(Contacts $contacts)
    {
        try {
            $contact = Contacts::onlyTrashed()->findOrFail($contacts);
            $contact->forceDelete();
            return response()->json(['response' => 'Success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['response' => $th->getMessage()], 500);
        }
    }
}