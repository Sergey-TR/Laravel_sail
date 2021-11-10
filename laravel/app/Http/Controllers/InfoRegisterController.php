<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoRegisterController extends Controller
{
    public function infoRegister()
    {
        return view('auth.info');
    }
}
