<?php

namespace App\Permissions;

use App\Models\Permission;
use App\Models\Plan;

trait HasPermissionsTrait
{
    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);

        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function withdrawPermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughPlan($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughPlan($permission)
    {
        foreach ($permission->plans as $plan) {
            if ($this->plans->contains($plan)) {
                return true;
            }
        }
        return false;
    }

    public function hasPlan(...$plans)
    {
        foreach ($plans as $plan) {
            if ($this->plans->contains('slug', $plan)) {
                return true;
            }
        }
        return false;
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'users_plans');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('slug', $permissions)->get();
    }
}