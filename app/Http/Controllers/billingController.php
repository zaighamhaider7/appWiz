<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class billingController extends Controller
{
    public function billingView()
    {
        return view('user.billing');
    }
}
