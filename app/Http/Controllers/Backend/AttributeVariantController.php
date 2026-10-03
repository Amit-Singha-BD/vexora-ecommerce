<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttributeVariantController extends Controller
{
    public function attributeVariantView(){
        return view("Backend.Pages.Attribute-Variant-List");
    }

    public function attributeCreateView(){
        return view("Backend.Pages.Create-Attribute");
    }

    public function variantCreateView(){
        return view("Backend.Pages.Create-Variant");
    }
}
