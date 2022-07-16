<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\NewTicket;
use App\Models\UserTicket;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Unicodeveloper\Paystack\Facades\Paystack as FacadesPaystack;

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
        $paymentDetails = FacadesPaystack::getPaymentData();
        if ($paymentDetails['status']) {

            $ticket = UserTicket::where('reference', $paymentDetails['data']['reference'])->first();
            $ticket->status = 1;
            $ticket->save();
            $qr = QrCode::format('png')->size(200)->generate('http://google.com');
            $mailData = [
                'code' =>  $ticket->ticket_code,
                'qr' => $qr
            ];
            Mail::to($ticket->customer_email)->send(new NewTicket($mailData));
            return Redirect::route('success')->withMessage(['msg' => 'Your ticket has been successfully paid.', 'type' => 'success']);
        } else {
            return Redirect::back()->with('error', 'The payment was not successful. Please try again.');
        }
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
