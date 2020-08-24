<?php

namespace App\Http\Controllers\Qq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;

class QqAuthController extends Controller
{
    public function test() 
    {
        return 456;
    }
    public function qq()
    {
        return Socialite::with('qq')->redirect();
    }

    public function qq_callback()
    {
        $oauthUser = Socialite::with('qq')->user();

        $data = [
            'nickname' => $oauthUser->getNickname(),
            'avatar'   => $oauthUser->getAvatar(),
            'open_id'  => $oauthUser->getId(),
        ];
        return $data;
    }
}
