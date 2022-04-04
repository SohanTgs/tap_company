<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferBalance extends Model
{


    public function receiverName()
    {
        return $this->hasOne(User::class,'id','receiver');
    }

    public function senderName()
    {
        return $this->hasOne(User::class, 'id', 'sender');
    }



}
