<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function campaignView(){
        return view("Backend.Pages.Campaign-List");
    }

    public function campaignCreateView(){
        return view("Backend.Pages.Create-Campaign");
    }
}
