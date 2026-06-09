<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $contact = Contact::findOrFail($id);

    return response()->json([
        'id' => $contact->id,
        'name' => $contact->name,
        'email' => $contact->email,
        'subject' => $contact->subject,
        'message' => $contact->message,
        'date' => $contact->created_at->format('M d, Y H:i')
    ]);
    }

     public function reply(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to($request->email)
                ->subject($request->subject);
        });

        return response()->json([
            'success' => true,
            'message' => 'Email sent successfully!'
        ]);
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
