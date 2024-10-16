<?php

namespace App\Services;

use App\Contracts\PaymentInterface;

readonly class PaymentService
{
    public function __construct(private PaymentInterface $payment) {
        //
    }

    public function processPayment(array $paymentCredentials) {
        return $this->payment->request($paymentCredentials);
    }
}
