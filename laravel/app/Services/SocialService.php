<?php

namespace App\Services;

use App\Contracts\Social;
use Laravel\Socialite\Contracts\User;
use App\Models\User as Model;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class SocialService implements Social
{
    public function loginUser(User $user): string
    {
        $authUser = Model::where('email', $user->getEmail())->first();
        //dd($authUser);
        if($authUser) {
            $authUser->name = $user->getName();
            $authUser->avatar = $user->getAvatar();
            if($authUser->save()) {
                Auth::loginUsingId($authUser->id);
                return route('account');
            }
        }
        return route('auth.info');
    }
}
