<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('index', compact('countries', $countries));
    }

}
