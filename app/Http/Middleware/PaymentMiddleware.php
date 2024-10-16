<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->fromCurrencyCode == $request->toCurrencyCode) {
            return back()->withErrors(['sameCurrency' => 'واحد های ارزی نباید یکسان باشند']);
        }

        $request->merge([
            'merchantId' => config('yekpay.merchantId'),
            'mobile' => convertPersianToEnglish($request->mobile),
            'postalCode' => convertPersianToEnglish($request->postalCode),
            'amount' => (float) convertPersianToEnglish($request->amount),
            'orderNumber' => time(),
            'callback' => env('CALLBACK_VERIFY')
        ]);

        return $next($request);
    }
}
