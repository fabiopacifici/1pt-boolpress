<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLeadMessage;



class LeadController extends Controller
{
    public function store(Request $request)
    {


        // validate the user inputs (create a custom validator)

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            // return an error response
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // create the lead in the db
        // create
        $newLead = Lead::create($request->all());

        // send email
        Mail::to('admin@boolpress.com')->send(new NewLeadMessage($newLead));

        return response()->json([
            'success' => true,
        ]);
    }
}
