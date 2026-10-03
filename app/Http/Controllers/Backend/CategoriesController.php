<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categoriesView(){
        return view("Backend.Pages.Categories-List");
    }

    public function categoriesCreateView(){
        return view("Backend.Pages.Create-Categories");
    }
}
