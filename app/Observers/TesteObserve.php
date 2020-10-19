<?php

namespace App\Observers;

use App\Models\Teste;
use Illuminate\Support\Facades\Auth;

class TesteObserve
{
    /**
     * Handle the teste "creating" event.
     *
     * @param  \App\Models\teste  $teste
     * @return void
     */
    public function creating(Teste $teste)
    {
        $user = Auth::user();
        $teste->created_by = $user->id;
    }
}
