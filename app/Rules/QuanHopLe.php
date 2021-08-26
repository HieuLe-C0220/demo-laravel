<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class QuanHopLe implements Rule
{
    protected $city_id = null;
    protected $quan_id = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->city_id = $request->city_id;
        $this->quan_id = $request->quan_id;
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
        //
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
