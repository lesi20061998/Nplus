<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'id',
        'access_code',
        'order_status',
        'payment_method',
        'payment_id_Backdoor',
        'request_information_id',
        'user_id',
        'is_destroy',
       
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