<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponView(){
        return view("Backend.Pages.Coupon-List");
    }

    public function couponCreateView(){
        return view("Backend.Pages.Create-Coupon");
    }
}
