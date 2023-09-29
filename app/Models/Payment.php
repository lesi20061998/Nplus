<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
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
    public static function createPayment($data)
    {


        try {
            DB::beginTransaction();

            $payment = new Payment();
            $payment->fill($data);
            $payment->save();
            DB::commit();
            return $payment;
        } catch (\Exception $e) {
 
            DB::rollBack();
            return null;
        }
    }
}
