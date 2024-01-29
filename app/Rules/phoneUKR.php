<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class phoneUKR implements Rule
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
        $phone = \App\Service\PhoneCast::cast($value);
        return preg_match('#^+380\d+#', $phone) && strlen($phone) === 13;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
