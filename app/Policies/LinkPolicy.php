<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
    
    public function update(User $user, Link $link)
    {
        return $link->user->is($user);

    }

}
