<?php

namespace App\Contracts;

interface PaymentInterface
{
    public function request(array $paymentCredentials);
}
