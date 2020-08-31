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
        dd($oauthUser);

        $datas = [
            'nickname' => $oauthUser->getNickname(),
            'avatar'   => $oauthUser->getAvatar(),
            'open_id'  => $oauthUser->getId(),
        ];
        dd($datas);
        return $datas;
    }

    public function thirdPartCallBack($thirdPartAuth)
    {
        $thirdPartName = substr($thirdPartAuth, 4);
        $oauthUser = Socialite::with("$thirdPartName")->user();
        dd($oauthUser);

        $datas = [
            'nickname' => $oauthUser->getNickname(),
            'avatar'   => $oauthUser->getAvatar(),
            'open_id'  => $oauthUser->getId(),
        ];
        dd($datas);
        return $datas;
    }

    /**
    * 按符号截取字符串的指定部分
    * @param string $str 需要截取的字符串
    * @param string $sign 需要截取的符号
    * @param int $number 如是正数以0为起点从左向右截  负数则从右向左截
    * @return string 返回截取的内容
    */
    function cut_str($str, $sign, $number){
        $array=explode($sign, $str);
        $length=count($array);
        if($number<0){
            $new_array=array_reverse($array);
            $abs_number=abs($number);
            if($abs_number>$length){
                return 0;
            }else{
                return $new_array[$abs_number-1];
            }
        }else{
            if($number>=$length){
                return 0;
            }else{
                return $array[$number];
            }
        }
    }

    public function abandoned(Request $request)
    {
        $uri = $request->getRequestUri();
        $thirdAuthName = $this->cut_str($uri, '/', 1);
        if($thirdAuthName) {
            $thirdPartName = substr($thirdAuthName, 4);
        } else {
            return response()->json([
                'error' => 'The request callback address is incorrect'
            ], );
        }

        dd($thirdPartAuth);
    }
}
