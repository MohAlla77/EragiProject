<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UppercaseEnglishAndDigits implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Validation logic to check if value contains only uppercase English letters and digits
        return preg_match('/^[A-Z0-9]{17}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be 17 characters long and contain only uppercase English letters and digits.';
    }
}
