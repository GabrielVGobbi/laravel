<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plans_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_permissions');
    }
}
