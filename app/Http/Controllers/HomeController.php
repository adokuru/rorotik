<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\TicketType;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Paystack;

class HomeController extends Controller
{
    public function getStarted()
    {
        $companies = Company::paginate(10);
        return view('companies', compact('companies'));
    }

    public function getVendors($id)
    {
        $vendors = Vendor::where('ticket_type_id', $id)->get();
        return view('vendor', compact('vendors'));
    }

    public function getTicketTypes($id)
    {
        $company = Company::where('id', $id)->with('ticketTypes')->first();
        return view('ticketTypes', compact('company'));
    }

    public function createTicket(Request $request)
    {
        $vendor = Vendor::where('id', $request->vendor_id)->first();
        return view('tickets', compact('vendor'));
    }

    public function payTicket(Request $request)
    {

        $request->validate([
            'vendor_id' => 'required',
            'ticket_type_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'Phone' => 'required',
            'amount' => 'required',
        ]);

        $vendor = Vendor::where('id', $request->vendor_id)->first();
        $ticketType = TicketType::where('id', $vendor->ticket_type_id)->first();
        $ticket = $vendor->userTickets()->create([
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->Phone,
            'amount' => $request->amount,
            'note' => $request->about,
            'ticket_code' => $this->generateTicketCode() . $request->amount,
            'quantity' => $request->quantity ? $request->quantity : 1,
            'reference' => Paystack::genTranxRef(),
        ]);

        return view('payTicket', compact('vendor', 'ticket', 'ticketType'));
    }

    public function generateTicketCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function paymentTicket(Request $request)
    {
        $data = array(
            "amount" => $request->amount * 100,
            "reference" => $request->email,
            "email" => $request->email,
            "currency" => "NGN",
            "orderID" => $request->ticket_code,
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }
}
