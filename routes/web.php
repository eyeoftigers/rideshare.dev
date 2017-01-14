<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('auth/fb', 'Auth\AuthController@redirectToProvider');
Route::get('auth/fb/callback', 'Auth\AuthController@handleProviderCallback');


Route::get('/test',function(){
    
$data= App\Models\Member::with('MemberPreference',
                               'MemberPreference.ChitchatPreference',
                               'MemberPreference.MusicPreference',
                               'MemberPreference.PetPreference',
                               'MemberPreference.SmokingPreference'
                               )->first();
return view('welcome', $data);

//return App\Models\ChitchatPreference::all();
//return App\Models\MemberPreference::all();
//return App\Models\SmokingPreference::all();
//return App\Models\PetPreference::all();
//return App\Models\MusicPreference::all();

//return App\Models\ChitchatPreference::all();
}
);
