<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{
    public function index()
    {
       
        $payments = Payment::with(['user' => function ($query) {
            $query->where('name', 'Admin');
        }, 'requestInformation'])->get();
        return view('index', compact('payments'));
    }
}
