<?php

namespace App\Http\Controllers\Frontend\Payment;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    // /**
    //  * create transaction.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function createTransaction()
    {
        // return view('transaction');
        // $this->test();
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {

        $total = round(Session::get('totalBill') / 22878, 2);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('web.cart_product.checkout_cart')
                ->with('error', 'Loix.');
        } else {

            return redirect()
                ->route('web.cart_product.checkout_cart')
                ->with('error', $response['message'] ?? 'Looic.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        Session::forget('totalBill');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('web.cart_product.checkout_cart')
                ->with('success', 'Transaction complete.');
        } else {

            return redirect()
                ->route('web.cart_product.checkout_cart')
                ->with('error', $response['message'] ?? 'Lỗi.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {

        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'Lôix.');
    }
}