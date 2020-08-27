<?php

namespace App\Http\Controllers\ThirdPart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;

class LoginAuthController extends Controller
{

    public function thirdLogin($thirdPart)
    {
        return Socialite::with($thirdPart)->redirect();
    }

    public function gitHubCallBack()
    {
        $oauthUser = Socialite::with('github')->user();
        // dd($oauthUser);

        $datas = [
            'nickname' => $oauthUser->getNickname(),
            'avatar'   => $oauthUser->getAvatar(),
            'open_id'  => $oauthUser->getId(),
        ];
        dd($datas);
        return $datas;
    }

    public function qqCallBack()
    {
        $oauthUser = Socialite::with('qq')->user();
        // dd($oauthUser);

        $datas = [
            'nickname' => $oauthUser->getNickname(),
            'avatar'   => $oauthUser->getAvatar(),
            'open_id'  => $oauthUser->getId(),
        ];
        dd($datas);
        return $datas;
    }
}
