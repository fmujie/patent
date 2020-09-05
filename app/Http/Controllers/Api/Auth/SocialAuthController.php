<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Faker\Generator;
use Illuminate\Http\Request;
use App\Models\Auth\SocialUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Api\Auth\AuthController;

class SocialAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:api', ['except' => ['socialStore']]);
    }

    public function socialStore($type, Request $request) {
        if (!in_array($type, ['qq', 'weibo', 'github'])) {
            return $this->failed('请求方式错误');
        } else {
            $driver = Socialite::driver($type);
            try {
                $code = $request->code;
                $response = $driver->getAccessTokenResponse($code);
                $token = array_get($response, 'access_token');
                
                $oauthUser = $driver->userFromToken($token);
            }
            catch(\Exception $e) {
                return $this->failed('参数错误，未获取用户信息');
            }
        }
        $user = null;
        switch ($type) {
            case 'qq':
            case 'weibo':
                $user = SocialUserModel::firstOrCreate([
                    'open_id' => $oauthUser->getId()->first()
                ], [
                    'type' => "$type",
                    'open_id' => $oauthUser->getId(),
                    'nickname' => $oauthUser->getNickname(),
                    'avatar' => $oauthUser->getAvatar(),
                ]);
                break;
            
            case 'github':
                break;
        }
        $token = Auth::guard('api')->setTTL(60 * 24 * 365)->fromUser($user);
        return $this->respondWithToken($token)->setStatusCode(201);
    }

    /**
      * Get the authenticated User.
      *
      * @return \Illuminate\Http\JsonResponse
      */
      public function me()
      {  
         return response()->json(auth()->user());
      }
  
    /**
    * Log the user out (Invalidate the token).
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
  
    /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
      * Get the token array structure.
      *
      * @param  string $token
      *
      * @return \Illuminate\Http\JsonResponse
      */
      protected function respondWithToken($token)
      {
          return response()->json([
              'access_token' => $token,
              'token_type' => 'bearer',
              'expires_in' => auth()->factory()->getTTL()
          ]);
      }
}
