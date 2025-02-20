<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(empty($value))
        {
            $fail('The reCAPTCHA verification is required');
            return;
        }

        $secret = env('RECAPTCHA_SECRET_KEY');
        $responce = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret' => $secret,
            'response' => $value,
        ]);

        $data = $responce->json();

        if(!$data['success']){
            $fail('the reCAPTCHA verification failed. Please try again.');
        }
    }
}
