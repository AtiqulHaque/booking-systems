<?php


namespace App\Contracts\Service;


interface PaymentServiceContract
{
    public function fullPayment($bookingId, $userId, $amount, $isFullPayment = true);

    public function pertialPayment($bookingId, $amount, $userId);
}
