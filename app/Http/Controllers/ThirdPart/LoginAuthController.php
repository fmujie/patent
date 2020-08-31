<?php

namespace App\Http\Controllers\ThirdPart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginAuthController extends Controller
{

    public function thirdLogin($thirdPart)
    {
        return Socialite::with($thirdPart)->redirect();
    }

    public function gitHubCallBack()
    {
        $oauthUser = Socialite::with('github')->user();

        $oauthUser = User::firstOrCreate([
            'email' => $oauthUser->email,
        ],[
            'name' => $oauthUser->name,
            'password' =>Hash::make(Str::random(24))
        ]);

        Auth::login($oauthUser, true);

        return redirect('/home');
    }

    public function qqCallBack()
    {
        $oauthUser = Socialite::with('qq')->user();

        $datas = [
            'nickname' => $oauthUser->getNickname(),
            'avatar'   => $oauthUser->getAvatar(),
            'open_id'  => $oauthUser->getId(),
        ];
        dd($datas);
        return $datas;
    }

    public function weiboCallBack()
    {
        $oauthUser = Socialite::with('weibo')->user();

        $datas = [
            'nickname' => $oauthUser->getNickname(),
            'avatar'   => $oauthUser->getAvatar(),
            'open_id'  => $oauthUser->getId(),
        ];
        dd($datas);
        return $datas;
    }
}
