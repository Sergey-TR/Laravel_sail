<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialsController extends Controller
{
    public function link($socialName)
    {
        //dd($socialName);
        return Socialite::driver($socialName)->redirect();
    }

    public function callback(Social $social, $socialName)
    {
        //dd($socialName);
        try {
            return redirect(
                $social->loginUser(
                    Socialite::driver($socialName)->user()
                )
            );
        }catch (\Exception $exception) {
            Log::error($exception->getMessage() . PHP_EOL, $exception->getTrace());
            dd($exception->getMessage());
        }
    }
}
