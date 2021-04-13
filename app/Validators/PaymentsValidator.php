<?php

namespace App\Validators;


class PaymentsValidator extends AbstractLaravelValidator
{
    public function setRules()
    {
        $this->rules = array(
            'booking_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
        );
    }

}
