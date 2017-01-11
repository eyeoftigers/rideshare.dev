<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Socialite;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $userExist = User::whereEmail($user->getEmail())->first();
        
        if($userExist)
        {   
            Auth::login($userExist);
            
        }
        else
        {
            $newUserCreated=User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt(123456),
            ]);
            
            if($newUserCreated)
            {
                Auth::login($newUserCreated);
               
            }

        }
        return redirect('/home');
        
    }
}