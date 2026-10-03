<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productView(){
        return view("Backend.Pages.Product-List");
    }

    public function productCreateView(){
        return view("Backend.Pages.Create-Product");
    }

    public function productImageView(){
        return view("Backend.Pages.Product-Image");
    }
}
