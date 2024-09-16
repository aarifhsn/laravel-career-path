<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DisposableEmail implements ValidationRule
{

    // List of known disposable email domains
    protected array $disposableDomains = [
        'mailinator.com',
        'tempmail.com',
        '10minutemail.com',
        'guerrillamail.com',
        'yopmail.com',
        'spamherelots.com',
        'spam4.me',
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Extract the domain from the email
        $domain = substr(strrchr($value, "@"), 1);

        // Check if the domain is in the list of disposable domains
        if (in_array($domain, $this->disposableDomains)) {
            $fail('Disposable email addresses are not allowed.');
        }
    }
}
