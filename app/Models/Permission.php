<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['permission_name', 'permission_slug'];

    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class);
    }
}
