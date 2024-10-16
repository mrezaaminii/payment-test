<?php

namespace App\Http\Controllers;

use App\DTOs\PaymentDTO;
use App\Http\Requests\PaymentRequest;
use App\Repositories\TransactionRepository;
use App\Services\APIs\YekPayService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function __construct(private readonly TransactionRepository $repository)
    {

    }

    public function index()
    {
        return view('payment.credentials');
    }

    public function initiatePayment(PaymentRequest $request)
    {
        $paymentData = PaymentDTO::fromArray($request->all())->toArray();
        try {
            $paymentService = new PaymentService(YekPayService::getInstance());

            $object = $paymentService->processPayment($paymentData);

            $this->repository->storeTransaction($object);
            if ($object->Code == 100) {
                $paymentUrl = config('yekpay.yekPayGateWayApi') . $object->Authority;
                return redirect()->away($paymentUrl);
            } else {
                return back()->withErrors(['YekPayError' => 'ارور بانک : '.  __($object->Description)]);
            }

        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function verify(Request $request)
    {
        try {
            if ($request->query('success') == '1') {

                $result = YekPayService::getInstance()->verify($request);

                if (isset($result->Code) && $result->Code == 100) {
                    $this->repository->updateTransaction($result->Authority, $result);
                    return to_route('payment.form')->with(['success' => __('YekPay Payment Completed')]);
                } else {
                    $this->repository->updateTransaction($result->Authority, $result);
                    return to_route('payment.form')->withErrors(['YekPayError' => __($result->Description) ?? __('Unknown error')]);
                }
            } else {
                return to_route('payment.form')->with(['message' => __('YekPay Payment Cancelled')]);
            }
        } catch (\Exception $ex) {
            logger($ex);
            abort(500);
        }
    }
}
