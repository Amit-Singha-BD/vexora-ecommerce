<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function loginView(){
        return view("Authentication.Pages.Login");
    }

    public function registerView(){
        return view("Authentication.Pages.Registration");
    }
}
