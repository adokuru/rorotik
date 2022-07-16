<?php

namespace App\Http\Controllers;

use App\Models\UserTicket;
use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ticket = UserTicket::where('ticket_code', $request->code)->first();
        return view('dashboard', compact('ticket'));
    }
}
