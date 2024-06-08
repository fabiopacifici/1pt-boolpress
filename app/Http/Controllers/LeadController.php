<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadMessage;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function create()
    {
        return view('guests.leads.create');
    }


    public function store(Request $request)
    {
        //dd($request);


        // validate
        $val_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:2000'
        ]);

        // create
        $newLead = Lead::create($val_data);

        // send email
        Mail::to('admin@boolpress.com')->send(new NewLeadMessage($newLead));

        // redirect
        return back()->with('message', 'Message sent successfully');
    }
}
