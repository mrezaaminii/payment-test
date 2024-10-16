<?php

namespace App\Services\APIs;

use App\Contracts\PaymentInterface;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class YekPayService implements PaymentInterface
{
    private static ?YekPayService $instance = null;
    private string $authorizationApi;

    private function __construct()
    {
        $this->authorizationApi = Config::get('yekpay.yekPayAuthorizationApi');
    }

    public static function getInstance(): YekPayService
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function request(array $paymentCredentials)
    {
        return $this->payment($paymentCredentials);
    }

    public function payment(array $paymentCredentials)
    {
        $response = Http::withOptions(['verify' => false])->post($this->authorizationApi, $paymentCredentials);

        return $response->object();
    }

    public function verify($request)
    {
        $authority = $request->query('authority');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withOptions(['verify' => false])->post('https://api.ypsapi.com/api/sandbox/verify', [
            'merchantId' => 'PNKT9RVJ2YBS8VSYXNMCVYSY8TMNZSB7',
            'authority'  => $authority,
        ]);

        return json_decode($response->body());
    }
}
