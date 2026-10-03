<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentTrackingController extends Controller
{
    public function paymentTrackingView(){
        return view("Backend.Pages.Payment-Tracking");
    }
}
