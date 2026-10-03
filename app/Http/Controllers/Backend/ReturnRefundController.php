<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnRefundController extends Controller
{
    public function returnRefundView(){
        return view("Backend.Pages.Return-Refund");
    }
}
