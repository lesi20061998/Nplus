<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requestInformation()
    {
        return $this->belongsTo(RequestInformation::class, 'request_information_id');
    }
}
