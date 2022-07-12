<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function userTickets()
    {
        return $this->hasMany(UserTicket::class);
    }

    public function ticketTypes()
    {
        return $this->belongsTo(TicketType::class);
    }
}
