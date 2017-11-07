<?php

namespace App\Models\traits;

use Illuminate\Support\Facades\Auth;

trait GetUserAuthorization
{
    public function getUserAuthAttribute()
    {
        if(Auth::check()){
            return Auth::id();
        }
        return null;
    }

}