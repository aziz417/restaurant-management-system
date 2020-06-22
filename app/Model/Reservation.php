<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'date_and_time', 'message', 'status'];
}
