<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialsController extends Controller
{
    public function link()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(Social $social)
    {
        try {
            return redirect(
                $social->loginUser(
                    Socialite::driver('vkontakte')->user()
                )
            );
        }catch (\Exception $exception) {
            Log::error($exception->getMessage() . PHP_EOL, $exception->getTrace());
            dd($exception->getMessage());
        }
    }
}
