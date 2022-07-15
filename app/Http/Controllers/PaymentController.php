<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserTicket;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        if ($paymentDetails['status']) {

            $ticket = UserTicket::where('reference', $paymentDetails['data']['reference'])->first();
            $ticket->status = 1;
            $ticket->save();

            return Redirect::route('success')->withMessage(['msg' => 'Your ticket has been successfully paid.', 'type' => 'success']);
        } else {
            return Redirect::back()->with('error', 'The payment was not successful. Please try again.');
        }
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
