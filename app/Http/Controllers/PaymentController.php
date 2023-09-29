<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user' => function ($query) {
            $query->where('name', 'Admin');
        }, 'requestInformation'])->get();
        return view('admin.PaymentMangager', compact('payments'));
        // $user = Auth::user();
        // if (Auth::check('admin')) {
           
        // } else {
        //    return redirect('admin');
        // }
    }
    function create(){
        return view('admin.');

    }
}
