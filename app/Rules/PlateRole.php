<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class PlateRole implements Rule
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
    // Check if the value matches the specified format
    return preg_match('/^[\p{L}]{3}\d{4}$/u', $value);
}

    public function message()
    {
        return 'The :attribute must be 3 characters followed by 4 digits.';
    }
}
