<?php

namespace App\DTOs;

readonly class PaymentDTO
{
    public function __construct(public string $merchantId, public int $fromCurrencyCode, public int $toCurrencyCode, public string $email, public string $mobile, public string $firstName, public string $lastName, public string $address, public string $postalCode, public string $country, public string $city, public string $description, public float $amount, public int $orderNumber, public string $callback)
    {
        //
    }

    public static function fromArray(array $data)
    {
        return new static($data['merchantId'], $data['fromCurrencyCode'], $data['toCurrencyCode'], $data['email'], $data['mobile'], $data['firstName'], $data['lastName'], $data['address'], $data['postalCode'], $data['country'], $data['city'], $data['description'], $data['amount'], $data['orderNumber'], $data['callback']);
    }

    public function toArray()
    {
        return [
            'merchantId' => $this->merchantId,
            'fromCurrencyCode' => $this->fromCurrencyCode,
            'toCurrencyCode' => $this->toCurrencyCode,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'address' => $this->address,
            'postalCode' => $this->postalCode,
            'country' => $this->country,
            'city' => $this->city,
            'description' => $this->description,
            'amount' => $this->amount,
            'orderNumber' => $this->orderNumber,
            'callback' => $this->callback,
        ];
    }
}
