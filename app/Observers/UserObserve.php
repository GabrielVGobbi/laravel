<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserObserve
{
    /**
     * Handle the teste "creating" event.
     *
     * @param  \App\Models\User  $teste
     * @return void
     */
    public function creating(User $user)
    {
        $user->uuid = Str::uuid();

    }
}
