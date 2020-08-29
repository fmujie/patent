<?php

namespace App\Http\Controllers\ThirdPart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use User;
use Illuminate\Support\Facades\Auth;

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
