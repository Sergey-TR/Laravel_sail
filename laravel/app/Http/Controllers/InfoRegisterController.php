<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SocialiteProviders\Manager\OAuth2\User;

class InfoRegisterController extends Controller
{
    public function infoRegister($userEmail)
    {
        return view('auth.info', ['email' => $userEmail]);
    }
}
