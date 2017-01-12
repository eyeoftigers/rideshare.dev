<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Socialite;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Redirect the member to the GitHub authentication page.
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

        $memberExist = Member::whereEmail($user->getEmail())->first();
        
        if($memberExist)
        {   
            Auth::login($memberExist);
            
        }
        else
        {
            $newMemberCreated=Member::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt(123456),
            ]);
            
            if($newMemberCreated)
            {
                Auth::login($newMemberCreated);          
            }

        }
        return redirect('/home');
        
    }
}