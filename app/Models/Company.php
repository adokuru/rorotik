<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }

    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }
}
