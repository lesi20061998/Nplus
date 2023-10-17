<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'access_code',
        'order_status',
        'payment_method',
        'user_id',
        'request_information_id',
    ];

    public function requestInformation()
    {
        return $this->belongsTo(RequestInformation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}