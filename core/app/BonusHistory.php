<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusHistory extends Model
{

    public function registrationBonusUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }




}
