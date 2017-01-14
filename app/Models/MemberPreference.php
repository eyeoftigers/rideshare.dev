<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPreference extends Model
{
    //

    public function Member()
    {
        return $this->belongsTo('App\Model\Member');
    }

    public function ChitchatPreference(){
        return  $this->belongsTo('App\Models\ChitchatPreference');
    }
    
    public function MusicPreference(){
        return  $this->belongsTo('App\Models\MusicPreference');
    }

    public function PetPreference(){
        return  $this->belongsTo('App\Models\PetPreference');
    }

    public function SmokingPreference(){
        return  $this->belongsTo('App\Models\SmokingPreference');
    }
}
