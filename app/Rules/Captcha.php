<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $secretKey = env('GOOGLE_CAPTCHA_KEY');
        $response = $value;
        $userIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
        $response = \file_get_contents($url);
        $response = json_decode($response);        
        
        if (!$response->success) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute google captcha failed.';
    }
}
