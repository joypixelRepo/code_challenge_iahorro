<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
      'full_name',
      'email',
      'phone',
      'net_income',
      'requested_amount',
      'time_slot',
      'expert',
    ];
}
