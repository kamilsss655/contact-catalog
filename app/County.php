<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    //County belongs to contact -> contact belongs to user
    public function contact()
    {
        return $this->hasManyThrough('App\Contact', 'App\User');
    }
}
