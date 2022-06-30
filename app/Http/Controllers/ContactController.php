<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Rules\Captcha;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function __construct()
    {
        $this->validations = [
            'firstname' => ['required', 'max:255', 'string'],
            'lastname' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email', 'max:255', 'string'],
            'phone' => ['max:50', 'regex:/^(00261|^\+261|^0)+\s?(32|34|33|38)+\s?[0-9]{2}\s?[0-9]{3}\s?[0-9]{2}$/i'],
            'zipcode' => '',
            'city' => '',
            'msg' => ['max:1000', 'string'],
            'g-recaptcha-response' => [new Captcha]
        ];
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $this->validate($request, $this->validations);
        // Create a new contact

        $contact = new Contact;
        
        $contact->firstname = $validatedData['firstname'];
        $contact->lastname = $validatedData['lastname'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->msg = $validatedData['msg'];
        $contact->zipcode = Null;
        $contact->city = Null;
        $contact->ip_address = $request->ip();

        $contact->save();        
        
        return response()->json(['response' => 'Message saved']);
    }
}
