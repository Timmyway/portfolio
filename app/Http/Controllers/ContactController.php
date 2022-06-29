<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = '6LdToqwgAAAAABs7sXo64YQ-6mbu7bv5UDs7nBvL';
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "URL: https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                
                if (!$response->success) {
                    $fail($attribute.'google reCaptcha failed');                    
                }                
            }            
        ];
    }

    public function sendMessage(Request $request)
    {
        $postDatas = $this->validate($request, $this->validations);
        // Create a new contact

        $contact = new Contact;
        
        $contact->firstname = $postDatas['firstname'];
        $contact->lastname = $postDatas['lastname'];
        $contact->email = $postDatas['email'];
        $contact->phone = $postDatas['phone'];
        $contact->msg = $postDatas['msg'];
        $contact->zipcode = $postDatas['zipcode'];
        $contact->city = $postDatas['city'];
        $contact->ip_address = $request->ip();

        // $contact->save();

        return ($postDatas);
        
        return response()->json(['response' => 'Message saved']);
    }
}
