<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{

    protected $providers = [ "google", "facebook" ];


    public function redirect($provider)
    {
        if(!in_array($provider, $this->providers)){
            abort(403);
        }
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            $socialUsername = explode('@', $socialUser->email);
            $socialUserPass = Hash::make($socialUser->getName().'@'.$socialUser->getId());
            $isregistered = User::where('unique_identifier', $socialUsername)->first();
            //dd($socialUser->token);
            if(!in_array($provider, $this->providers))
            {
                abort(403);
            }
            elseif($isregistered )
            {
                Auth::login($isregistered);
                return redirect('/dashboard');

            }
    
            $user = User::updateOrCreate([
                'provider_id' => $socialUser->id,
                'provider' => $provider
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => $socialUserPass,
                'unique_identifier' => $socialUsername[0],
                'provider_token' => $socialUser->token,
            ]);
         
            Auth::login($user);
            return redirect('/dashboard');

        } catch (\Exception $e) {

            return $e->getMessage();
        }

    }
        
}
