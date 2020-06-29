<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;

class SocialController extends Controller
{
    public function getTwitterAuth() {
        return Socialite::driver('twitter')->redirect();
    }

    public function getTwitterAuthCallback() {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/login/twitter');
        }
 
        $authUser = $this->findOrCreateTwitterUser($user);
        Auth::login($authUser, true);
 
        return redirect()->route('sale.index');
    }

    private function findOrCreateTwitterUser($twitterUser)
    {
        $authUser = User::where('twitter_id', $twitterUser->id)->first();
        if ($authUser){
            return $authUser;
        }
 
        return User::create([
            'name' => $twitterUser->nickname, 
            'twitter_id' => $twitterUser->id,
            'twitter_name' => $twitterUser->nickname, 
            'avatar' => $twitterUser->avatar_original
        ]);
    }
}
