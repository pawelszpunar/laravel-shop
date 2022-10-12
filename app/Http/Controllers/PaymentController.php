<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\ValueObjects\Cart;
use Devpark\Transfers24\Requests\Transfers24;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PaymentController extends Controller
{
    private Transfers24 $transfers24;

    public function __construct(Transfers24 $transfers24)
    {
        $this->transfers24 = $transfers24;
    }

    /**
     * Update status of the payment
     *
     */
    public function status(Request $request): void
    {
        $response = $this->transfers24->receive($request);
        $payment = Payment::where('session_id', $response->getSessionId())->firstOrFail();
        if(!is_null($payment)) {
            if ($response->isSuccess()) {
               $payment->status = PaymentStatus::SUCCESS;
            } else {
                $payment->status = PaymentStatus::ERROR;
                $payment->error_code = $response->getErrorCode();
                $payment->error_description = json_encode($response->getErrorDescription());
            }
            $payment->save();
        }
    }
}
